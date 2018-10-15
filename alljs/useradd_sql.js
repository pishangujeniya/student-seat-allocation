function adduserapi(std_name, std_password, std_marks) {
	$.post("http://localhost/" + "SD/webAPI/SignUp.php", { std_name: std_name, std_password: std_password, std_marks: std_marks })
		.done(function (data) {
			console.log(data);
			var data_json = JSON.parse(data);
			if (data_json.success == "true") {
				console.log("New user created successfully");
				console.log(data_json);
				alert("Your Login Student Id is : "+data_json.std_id);
				logOut();
			} else {
				alert(data_json.error);
				console.log(data_json.error);
			}
		});
}

function loginuserapi(userName, userPassword, successToPath) {
	$.post("http://localhost/" + "SD/webAPI/LogIn.php", { std_id: userName, std_password: userPassword })
		.done(function (data) {
			console.log(data);
			var data_json = JSON.parse(data);
			if (data_json.success == "true") {
				console.log("Login Success!!");
				console.log("Cookies Set progressing !!");
				setcookie("std_id", data_json.std_id);
				setcookie("std_rank", data_json.std_rank);
				setcookie("std_marks", data_json.std_marks);
				setcookie("session", true);
				window.location = successToPath;
			} else {
				alert("Incorrect Credentials");
				console.log(data_json.error);

			}
		});
}
