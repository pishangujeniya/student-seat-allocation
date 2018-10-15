function setcookie(key,value) {
    try {
        // Check browser support
        if (typeof (Storage) !== "undefined") {
            // Store
            localStorage.setItem(key, value);
            // Retrieve
            // document.getElementById("result").innerHTML = localStorage.getItem("lastname");
            // alert('Log in Success');
        } else {
            // document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
            alert('Sorry, your PC does not support Web Storage... You can\'t use our software ');
        }

    } catch (err) {
        console.log("Error in setcookie" + err);
    }
}

function getcookie(item) {
    try {
        // Check browser support
        if (typeof (Storage) !== "undefined") {
            // Retrieve
            // document.getElementById("result").innerHTML = localStorage.getItem("username");
            // document.getElementById("result").innerHTML = localStorage.getItem("password");
            // document.getElementById("result").innerHTML = localStorage.getItem("session");
            var data = localStorage.getItem(item);
            //console.log(data);
            return data;
        } else {
            alert('Sorry, your PC does not support Web Storage... You can\'t use our software ');
        }
    } catch (err) {
        console.log("Error in getcookie" + err);
    }
}

function logOut() {
    localStorage.clear();
    console.log("\nUser Logged out\n");
    window.location = "../Login/login.html";
}



