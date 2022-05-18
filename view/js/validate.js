function validate(e){
    e.preventDefault();

    form = document.getElementById("formUsuario");
    nom = document.getElementById("txtName");
    lName = document.getElementById("txtLName");
    user = document.getElementById("txtUser");
    password = document.getElementById("txtPWord");


    lvali = true;

    if(nom.value==""){
        nom.style.borderColor="red";
        lvali = false;
        ohSnap('no pusiste el nombre pa', {color: 'red'});  // alert will have class 'alert-color'
    }

    if(lName.value==""){
        lName.style.borderColor="red";
        ohSnap('no pusiste el apellido pa', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(user.value==""){
        user.style.borderColor="red";
        ohSnap('no pusiste el usuario pa', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(password.value==""){
        password.style.borderColor="red";
        ohSnap('no pusiste tu contra pa', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }


    if(lvali == true ){
        form.submit();
    }
}
function validateModificate(e){
    e.preventDefault();

    form = document.getElementById("formUsuarioModificar");
    nom = document.getElementById("txtNameE");
    lName = document.getElementById("txtLNameE");
    user = document.getElementById("txtUserE");
    password = document.getElementById("txtPWordE");


    lvali = true;

    if(nom.value==""){
        nom.style.borderColor="red";
        lvali = false;
        ohSnap('no pusiste el nombre pa', {color: 'red'});  // alert will have class 'alert-color'
    }

    if(lName.value==""){
        lName.style.borderColor="red";
        ohSnap('no pusiste el apellido pa', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(user.value==""){
        user.style.borderColor="red";
        ohSnap('no pusiste el usuario pa', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(password.value==""){
        password.style.borderColor="red";
        ohSnap('no pusiste tu contra pa', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }


    if(lvali == true ){
        form.submit();
    }
}