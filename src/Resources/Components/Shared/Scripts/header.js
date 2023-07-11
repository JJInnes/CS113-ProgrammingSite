function quickLogOut(){
    console.log("CLEARED AUTH:");
    document.cookie = 'authToken="abcd";path=/;Max-Age=0;';
    location.reload();
}

console.log("HEADER:");
console.log("Cookies:");
console.log(document.cookie);

const regex = /authToken=[^;]+?(;|$)/gm;

try{        //Is logged in
    var tokenCookie = regex.exec(document.cookie)[0];

    console.log("Cookie:");
    console.log(tokenCookie);

    var tokenRaw = atob(tokenCookie.substring(10, tokenCookie.length - 1));
    var token = JSON.parse(tokenRaw.substring(7, tokenRaw.length - 2));

    console.log("Raw token");
    console.log(tokenRaw)
    console.log("Token:");
    console.log(token);

    document.getElementById("user").innerHTML = '<div id="userImage"></div> <p>' + token.name + '</p><div id="quickSignOut" onClick="quickLogOut()"></div>';
} 
catch{      //Is not logged in

}


