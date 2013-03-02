<?php
/**
* BreezingForms - A Joomla Forms Application
* @version 1.8
* @package BreezingForms
* @copyright (C) 2008-2012 by Markus Bopp
* @license Released under the terms of the GNU General Public License
**/
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

JImport( 'joomla.html.editor' );
$editor = JFactory::getEditor();
echo '<input type="submit" class="btn btn-primary" value="'.JText::_('SAVE').'" onclick="saveText();parent.SqueezeBox.close();"/><br/><br/>';
echo '<div style="width:700px;">'.$editor->display("bfEditor",'',700,300,40,20,1).'</div>';
echo '<br/><input type="submit" class="btn btn-primary" value="'.JText::_('SAVE').'" onclick="saveText();parent.SqueezeBox.close();"/>';
echo '<script>
function bfLoadText(){
	var item = parent.app.findDataObjectItem(parent.app.selectedTreeElement.id, parent.app.dataObject);

	// workaround for quote bug with jce
	var testEditor = '.$editor->getContent('bfEditor').'

	if(testEditor == "item.properties.pageIntro" || testEditor == "item.properties.description"){
		if(item && item.properties.type == "page"){
			setTimeout("setIntro()",100);
		} else if(item && item.properties.type == "section"){
			setTimeout("setDescription()",250);
		}
	} else {
                if(item && item.properties.type == "page"){
			setTimeout("setIntro0()",100);
		} else if(item && item.properties.type == "section"){

			setTimeout("setDescription0()",250);
		}
        }
};
function saveText(){
	var item = parent.app.findDataObjectItem(parent.app.selectedTreeElement.id, parent.app.dataObject);
	if(item && item.properties.type == "page"){
		item.properties.pageIntro = '.$editor->getContent('bfEditor').'
	} else if(item && item.properties.type == "section"){
		item.properties.description = '.$editor->getContent('bfEditor').'
	}
	'.$editor->save('bfEditor').'
}
function setIntro0(){
	var item = parent.app.findDataObjectItem(parent.app.selectedTreeElement.id, parent.app.dataObject);
	'.$editor->setContent('bfEditor','item.properties.pageIntro').'
        var testEditor = '.$editor->getContent('bfEditor').'
        if( testEditor == "item.properties.pageIntro" || testEditor == "<p>item.properties.pageIntro</p>" || testEditor == "<div>item.properties.pageIntro</div>" ){
            setTimeout("setIntro00()",250);
        }
}
function setIntro00(){
    var item = parent.app.findDataObjectItem(parent.app.selectedTreeElement.id, parent.app.dataObject);
    '.$editor->setContent('bfEditor','\'+item.properties.pageIntro+\'').'
}
function setDescription0(){
	var item = parent.app.findDataObjectItem(parent.app.selectedTreeElement.id, parent.app.dataObject);
	'.$editor->setContent('bfEditor','item.properties.description').'
        var testEditor = '.$editor->getContent('bfEditor').'
            
        if( testEditor == "item.properties.description" || testEditor == "<p>item.properties.description</p>" || testEditor == "<div>item.properties.description</div>"){
        
            setTimeout("setDescription00()",250);
        }
}
function setDescription00(){
    var item = parent.app.findDataObjectItem(parent.app.selectedTreeElement.id, parent.app.dataObject);
    '.$editor->setContent('bfEditor','\'+item.properties.description+\'').'
}
function setIntro(){
	var item = parent.app.findDataObjectItem(parent.app.selectedTreeElement.id, parent.app.dataObject);
	'.$editor->setContent('bfEditor','\'+item.properties.pageIntro+\'').'
}
function setDescription(){
	var item = parent.app.findDataObjectItem(parent.app.selectedTreeElement.id, parent.app.dataObject);
	'.$editor->setContent('bfEditor','\'+item.properties.description+\'').'
}

setTimeout("bfLoadText()",500);
</script>';

