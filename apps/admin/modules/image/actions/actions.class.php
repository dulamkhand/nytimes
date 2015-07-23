<?php

/**
 * image actions.
 *
 * @package    grand
 * @subpackage image
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imageActions extends sfActions
{

  public function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('content'), 'admin', 'perm');
  }
  
  public function executeNew(sfWebRequest $request)
  {
      $this->forward404Unless($this->content = Doctrine_Core::getTable('Content')->find($request->getParameter('contentId')));
      $this->form = new ImageForm(null, array('contentId'=>$this->content->getId()));
  }

  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      $form = $request->getParameter('image');
      $contentId = $request->getParameter('contentId') ? $request->getParameter('contentId') : $form['content_id'];
      $this->forward404Unless($this->content = Doctrine_Core::getTable('Content')->find($contentId));
      
      $this->form = new ImageForm(null, array('contentId'=>$this->content->getId()));
      $this->processForm($request, $this->form);
      $this->setTemplate('new');
  }
  

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      $this->content = $image->getContent();
      $this->form = new ImageForm($image, array('contentId'=>$image->getContentId()));
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      $this->content = $image->getContent();
      $this->form = new ImageForm($image, array('contentId'=>$image->getContentId()));
      $this->processForm($request, $this->form);
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      $contentId = $image->getContentId();
      $image->delete();
      $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
      $this->redirect('image/new?contentId='.$contentId);
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid()) {
          $image = $form->save();
          $image->setUpdatedAt(date('Y-m-d H:i:s'));
          
          $folder = $image->getFolder();
          $fullfolder = sfConfig::get('sf_upload_dir').'/'.$folder;
          if($form->getValue('filename') && file_exists($fullfolder.'/'.$image->getFilename())) {
              $new_filename = str_replace('.png', '.jpg', $image->getFilename());
              if(in_array(GlobalLib::getFileExtension($image->getFilename()), array('png', 'PNG'))) {
                  // from PNG to JPG
                  $png = imagecreatefrompng($fullfolder.'/'.$image->getFilename());
                	imagejpeg($png, $fullfolder.'/'.$new_filename, 100);
                  imagedestroy($png); // remove from memory
                  unlink($fullfolder.'/'.$image->getFilename()); // remove png from folder
                  $image->setFilename($new_filename);
              }
              // create thumb 750, 240
              GlobalLib::createThumbs($new_filename, $folder, array(750), false);
              GlobalLib::createThumbs($new_filename, $folder, array(240), true);
              // create waterlink on 750
              $filepath = $fullfolder.'/t750-'.$new_filename;
              $img = new sfImage($filepath);
              $img->overlay(new sfImage(sfConfig::get('sf_web_dir').'/images/watermark.png'), 'bottom-right'); // TODO: png + png white
              $img->saveAs($filepath);
          }
          $image->save();
          
          // save cover photo for content
          if($image->getIsCover()) {
              $obj = Doctrine::getTable('Content')->find($image->getContentId());
              if($obj){
                  $obj->setCover('/u/'.$image->getFolder().'/t750-'.$image->getFilename());
                  $obj->save();	  
              }
          }

          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('image/new?contentId='.$image->getContentId());
      }
  }

}