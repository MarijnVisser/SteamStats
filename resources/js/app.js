require('./bootstrap');





// const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

// let authenticated = $('#authenticated').val();

// console.log(authenticated);

// let inactivityTime = function () {
//   let time;
//   window.onload = resetTimer;
//   document.onmousemove = resetTimer;
//   document.onkeypress = resetTimer;
//   function logout() {
//     LogoutFunction()
//   }
//   function resetTimer() {
//     clearTimeout(time);
//     time = setTimeout(logout, 2000)
//   }
// };
// if(authenticated == 1){
//     console.log('Auto logout in operation');
//     inactivityTime();
// }
// else{
//     console.log("false");
// }



// console.log(csrfToken);

// function LogoutFunction() {
//     fetch("http://127.0.0.1:8000/logout", {
//     headers:{
//         "Content-Type": "application/json",
//         "Accept": "application/json",
//         "X-Requested-With": "XMLHttpRequest",
//         "X-CSRF-Token": csrfToken 
//     },
//         credentials: "same-origin",
//         method: 'POST'
//     });
//     alert("you were automatically logged out");
// location.reload();
// }

alert('hello world');