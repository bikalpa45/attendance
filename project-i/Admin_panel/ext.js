function validFunction() {
    var name = document.getElementById('name').value;
    var username = document.getElementById('uname').value;
    var fname = document.getElementById('fname').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var pass = document.getElementById('pass')
    var gender = document.getElementsByName('type');
    var checkvalid = false;
    // for user name validation 
    var regex = /^[_a-zA-Z\s]{3,20}$/;
    if (name == "") {
        document.getElementById('message1').innerText = "Name is required";
        checkvalid = false;
    }
    else if (regex.test(fname) == false) {
        document.getElementById('message1').innerText = "Invalid Name";
        checkvalid = false;
    }
    else {
        document.getElementById('message1').innerText = "";
        checkvalid = true;
    }

//     var regex = /^[_a-zA-Z\s]{3,20}$/;
//     if (username == "") {
//         document.getElementById('messagea').innerText = "User name is required";
//         checkvalid = false;
//     }
//     else if (regex.test(username) == false) {
//         document.getElementById('messagea').innerText = "invalid user name";
//         checkvalid = false;
//     }
//     else {
//         document.getElementById('messagea').innerText = "";
//         checkvalid = true;
//     }
// //fname
//     var regex = /^[_a-zA-Z\s]{3,20}$/;
//     if (fname == "") {
//         document.getElementById('messageb').innerText = "Father name is required";
//         checkvalid = false;
//     }
//     else if (regex.test(fname) == false) {
//         document.getElementById('messageb').innerText = "Invalid Father name";
//         checkvalid = false;
//     }
//     else {
//         document.getElementById('messageb').innerText = "";
//         checkvalid = true;
//     }

//     // for gmail validation
//     var regex = /^[a-zA-Z_]([a-zA-Z0-9\.\-_]+)@([a-zA-Z0-9_\-]+)\.([a-zA-Z]){2,4}$/;
//     if (email == "") {
//         document.getElementById('message2').innerText = "email is required";
//         checkvalid = false;
//     }
//     else if (regex.test(email) == false) {
//         document.getElementById('message2').innerText = "invalid email";
//         checkvalid = false;
//     }
//     else {
//         document.getElementById('message2').innerText = "";
//         checkvalid = true;
//     }
//     // for phone number
//     var regex = /^[0-9]{10}$/;
//     if (phone == "") {
//         document.getElementById('message3').innerText = "phone is required";
//         checkvalid = false;
//     }
//     else if (regex.test(phone) == false) {
//         document.getElementById('message3').innerText = "phone number must be 10 digit";
//         checkvalid = false;
//     }
//     else {
//         document.getElementById('message3').innerText = "";
//         checkvalid = true;
//     }
//     // for user address validation 
//     var regex = /^[_a-zA-Z0-9\.-\s]{3,20}$/;
//     if (address == "") {
//         document.getElementById('message4').innerText = "Address is required";
//         checkvalid = false;
//     }
//     else if (regex.test(address) == false) {
//         document.getElementById('message4').innerText = "invalid address";
//         checkvalid = false;
//     }
//     else {
//         document.getElementById('message4').innerText = "";
//         checkvalid = true;
//     }
   
//     if (!gender.checked) {
//         document.getElementById('messagegender').innerText = "Gender is required";
//         checkvalid = false;
//     }
 
//     var regex = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
//     if (pass == "") {
//         document.getElementById('message5').innerText = "Password is required";
//         checkvalid = false;
//     }
//     else if (regex.test(pass) == false) {
//         document.getElementById('message5').innerText = "invalid Password";
//         checkvalid = false;
//     }
//     else {
//         document.getElementById('message5').innerText = "";
//         checkvalid = true;
//     }
    return checkvalid;

//     form.addEventListener("submit", (e) => {
//         if (!(validUserName==true && validEmail==true && validPhone==true && validPassword==true && confirmPassword==true)) {
//             e.preventDefault();

//  } })

}