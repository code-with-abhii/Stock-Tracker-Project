var u_password = document.getElementById("password")
var c_password = document.getElementById("c_password");
console.log(u_password.value);

if (u_password.value != c_password.value) {
    alert("passwords doesn't match")
} else {
    alert("registered successfully")
}