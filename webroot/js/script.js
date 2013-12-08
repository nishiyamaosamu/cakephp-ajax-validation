$(function(){
  $('form input, form select').blur(function(){
    var id = $(this).attr("id");
    var model = getModel(this);
    var field = getField(this);
    var parentDiv = getParentDiv(this);
    var errorMessageDiv = getErrorMessageDiv(parentDiv);
    //console.log("this val is " + $(this).val());
    $.post(
      '../ajax_validation/ajax_validation/action',{
          'model': model,
          'field': field,
          'val': $(this).val()
      },function(data){
        //div class error
        if( data && hasParentError(parentDiv) == false ){
          parentDiv.addClass("error");
        }else if( data == "" && hasParentError(parentDiv) == true){
          parentDiv.removeClass("error");
        }
        //Error Message
        if( data && errorMessageDiv[0] == undefined ){
          parentDiv.append("<div class='error-message'>" + data + "</div>");
        }else if( data ){
          errorMessageDiv.text(data);
        }else if( data == "" && errorMessageDiv[0] != undefined ){
          errorMessageDiv.remove();
        }
      }
    );
  })
});

function getModel(target){
  var name = $(target).attr("name");
  name_match = name.match(/data\[(.+)\]\[(.+)\]/);
  return name_match[1];
}

function getField(target){
  var name = $(target).attr("name");
  name_match = name.match(/data\[(.+)\]\[(.+)\]/);
  return name_match[2];
}

function getParentDiv(target){
  return $(target).parent('div.input');
}

function getErrorMessageDiv(parentDiv){
  return parentDiv.children("div.error-message");
}

function addErrorMessage(data,id){
  $('#' + id).after("<div class='error-message'>" + data + "</div>");
}

function hasParentError(parentDiv){
  parentDivClass = parentDiv.attr("class");
  hasError = (typeof( parentDivClass ) != 'undefined' && parentDivClass.indexOf("error")!=-1);
  return hasError;
}

function hasErrorMessage(parentDiv){
  errorMessageDiv = parentDiv.find("div.error-message");
  hasError = ( errorMessageDiv[0] != undefined );
  return hasError;
}
