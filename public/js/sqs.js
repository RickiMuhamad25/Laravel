// Last Modified by $Author: nindumat $ $Revision: 1.13 $ $Date: 2005/02/18 10:04:38 $

//## scripts disable context menu (right click pop-up menu)
/*
IE4plus = (document.all) ? true : false;
NS4 = (document.layers) ? true : false;

function clickIE() {
    return false;
}

function clickNS(e) {
    if (e.which==2 || e.which==3) {
        return false;
    }
}

if (!IE4plus) {
   document.captureEvents(Event.MOUSEDOWN || Event.MOUSEUP);
   document.onmousedown=clickNS;
   document.onmouseup= clickNS;
   document.oncontextmenu=clickIE; // For NS 6+
} else {
   document.onmouseup= clickIE;
   document.oncontextmenu=clickIE;
}
*/
//##

function displayErrorMessage( errorMessageFlag, errorMessage ) {
    if (errorMessageFlag == 'true') {
    alert( errorMessage );
    }
}

function returnToSFA(msg) {
    if (confirm(msg)) {
        location.replace("/sfa/sqs/SQSActivationServlet?reqAction=process&reqURL=/fp/sqs_home.jsp");
        parent.sfaFrameSet.rows = "100%,*";
    }
    else {};
}

function navigateProductJSP(destID, destIDValue, direction, directionValue) {
    destID.value = destIDValue;
    direction.value = directionValue;
}

function MM_findObj(n, d) { //v3.0
    var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
    if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
    for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
}

String.prototype.trim = function() {
    return( this.replace(/^\s*([\s\S]*\S+)\s*$|^\s*$/,'$1') );
}

function isNumeric(names) {
    var ctrls = names.split(",");
    var flag = true;
    var theValue;
    for(var i=0;i < ctrls.length;i++) {
        theValue = String(MM_findObj(ctrls[i]).value);
        flag = flag * !isNaN(theValue.trim()) * (theValue.trim() != "")
        if(flag) { flag = flag * (parseInt(theValue) >= 0); }
    }
    return flag;
}
function isInteger(names) {
    var re = new RegExp("\\.")
    var ctrls = names.split(",");
    var flag = true;
    var theValue;
    for(var i=0;i < ctrls.length;i++) {
        theValue = String(MM_findObj(ctrls[i]).value);
        flag = flag * !re.test(theValue) * !isNaN(theValue);
    }
    return flag;
}
function disableCtrls(disableCtrlNames, disableClassName) {
    var ctrls = disableCtrlNames.split(',');
    var ctrl;
    for(var i=0;i<ctrls.length;i++) {
        ctrl = MM_findObj(ctrls[i]);
        ctrl.disabled = true;
        ctrl.className = disableClassName;
    }
}
function enableCtrls(enableCtrlNames, enableClassName) {
    var ctrls = enableCtrlNames.split(',');
    var ctrl;
    for(var i=0;i<ctrls.length;i++) {
        ctrl = MM_findObj(ctrls[i]);
        ctrl.disabled = false;
        ctrl.className = enableClassName;
    }
}

function returnToAdviserInfo() {
    var frm = MM_findObj('fwdForm');
    frm.targetActionID.value = "AGENT_PROFILE";
    frm.direction.value = "BackwardTo";
    frm.processOtherID.value =  null;
    frm.target = "_self";
    frm.submit();
}

function returnToMainLifeProfile() {
    var frm = MM_findObj('fwdForm');
    frm.targetActionID.value = "LIFE_PROFILES";
    frm.direction.value = "BackwardTo";
    frm.processOtherID.value =  null;
    frm.target = "_self";
    frm.submit();
}

function returnToProductSelection() {
    var frm = MM_findObj('fwdForm');
    frm.targetActionID.value = "PRODUCT_SELECTION";
    frm.direction.value = "BackwardTo";
    frm.processOtherID.value =  null;
    frm.target = "_self";
    frm.submit();
}

function returnToPdtDetails() {
    var frm = MM_findObj('fwdForm');
    frm.targetActionID.value = "PRODUCT_SELECTION";
    frm.direction.value = "BackwardTo";
    frm.processOtherID.value =  null;
    frm.target = "_self";
    frm.submit();
}

function previous() {
    var frm = MM_findObj('fwdForm');
    frm.direction.value = "Backward";
    frm.targetActionID.value =  null;
    frm.processOtherID.value =  null;
    frm.target = "_self";
    frm.submit();
}
function next() {
    var frm = MM_findObj('fwdForm');
    frm.direction.value = "Forward";
    frm.targetActionID.value = null;
    frm.processOtherID.value = null;
    frm.target = "_self";
    frm.submit();
}

function grabFocus(){
  var i = 0;
  var formElements = document.forms["fwdForm"].elements;
  for(i=0; i<formElements.length; i++){
    if(formElements[i].type =="text"){
      if(formElements[i].readOnly == false){
        formElements[i].focus();
        return; 
      }
    }
  }
}

function blockDecimalAndSpecialChar(control){
  var textFieldValue = control.value;
  var pressedChar = textFieldValue.substring(textFieldValue.length-1, textFieldValue.length);
  var blocked = "~`!@#$%^&*()_-+={}[]|\\\"';:,<>./? "; 
  for(var i=0;i<blocked.length; i++){
    if(pressedChar == blocked.substring(i, i+1)){
      control.value=textFieldValue.substring(0, textFieldValue.length-1);
    }
  }
}

function blockAlphabetAndSpecialChar(control){
  var textFieldValue = control.value;
  var pressedChar = textFieldValue.substring(textFieldValue.length-1, textFieldValue.length);
  var blocked = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~`!@#$%^&*()_-+={}[]|\\\"';:,<>/? ";
  for(var i=0;i<blocked.length; i++){
    if(pressedChar == blocked.substring(i, i+1)){
      control.value=textFieldValue.substring(0, textFieldValue.length-1);
    }
  }
}

function blockAlphabetAndDecimalAndSpecialChar(control){
  var textFieldValue = control.value;
  var pressedChar = textFieldValue.substring(textFieldValue.length-1, textFieldValue.length);
  var blocked = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~`!@#$%^&*()_-+={}[]|\\\"';:,<>./? ";
  for(var i=0;i<blocked.length; i++){
    if(pressedChar == blocked.substring(i, i+1)){
      control.value=textFieldValue.substring(0, textFieldValue.length-1);
    }
  }
}


function blockDigitAndSpecialChar(control){
  var textFieldValue = control.value;
  var pressedChar = textFieldValue.substring(textFieldValue.length-1, textFieldValue.length);
  // 'blankspace' is not blocked
  var blocked = "0123456789~`!@#$%^&*()_-+={}[]|\\\"';:,.<>?";
  for(var i=0;i<blocked.length; i++){
    if(pressedChar == blocked.substring(i, i+1)){
      control.value=textFieldValue.substring(0, textFieldValue.length-1);
    }
  }
  
}


 function numbersWithDecimalPoint(event){
 	var charCode=(event.which)?event.which:event.keyCode;
	if(charCode>31 && (charCode<48 || charCode>57)){
	if(charCode!=46){
	
		return false;
	}
	}
	return true;
	
}

function numbersWithNoDecimalPoint(event){
	var charCode=(event.which)?event.which:event.keyCode;
	if(charCode>31 && (charCode<48 || charCode>57)){
		return false;
	}
	return true;
	
}

function onlyAlphabetsAndSlash(event){
	var charCode=(event.which)?event.which:event.keyCode;
	if((charCode>64 && charCode<91) || (charCode>96 && charCode<123) || charCode==47 ){
		return true;
	}
	return false;
	
}
function checkForEmptyValues(fieldValue){
 if(fieldValue == "" || fieldValue == "0" || fieldValue==null){
	return true;
 }
return false;
}
function openwin(url, width, height, scroll)
{
    if (!document.all)
    {
        document.captureEvents(Event.MOUSEMOVE);
        x = e.pageX + width - 30;
        y = e.pageY + height - 30;
    }
    else
    {
        x = document.body.scrollLeft + event.clientX + width - 30;
        y = document.body.scrollTop + event.clientY + height - 30;
    }
    window.open(url, "newWindow", "height=" + height + ", width=" + width + ", toolbar =no, menubar=no, scrollbars=" + scroll + ", resizable=no, location=no, status=no, top=" + y + ", left=" + x + "") //写成一行
}
