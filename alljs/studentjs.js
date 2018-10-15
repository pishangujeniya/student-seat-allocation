var site_host = "http://localhost/";

function getColleges() {
    console.log("getColleges");
    $.post(site_host + "/SD/webAPI/getColleges.php", {})
        .done(function (data) {
            var data_json = JSON.parse(data);
            if (data_json.success == "true") {
                console.log("success : " + data_json.success);
                all_clip_data = data_json;
                var count = 0;
                while (true) {
                    try {
                        var n_clip_id = data_json[count].college_id;
                        var n_clip_title = data_json[count].college_city;
                        var n_clip_data = data_json[count].college_name;
                        var n_clip_dead = data_json[count].dead;

                        colleges_array.push(n_clip_data);

                        count++;

                    } catch (e) {
                        populateCollegesIntoDropDown();
                        return;
                    }
                }
                count = 0;



            } else {
                console.log("success : " + data_json.success);
                console.log("error : " + data_json.error);
            }
        });
}

function getBranches(college_name, id_to_populate) {
    console.log("getBranches of : " + college_name);
    branch_array = [];
    $.post(site_host + "/SD/webAPI/getBranches.php", { college_name : college_name})
        .done(function (data) {
            var data_json = JSON.parse(data);
            if (data_json.success == "true") {
                console.log("success : " + data_json.success);
                all_clip_data = data_json;
                var count = 0;
                while (true) {
                    try {
                        var n_clip_id = data_json[count].college_id;
                        var n_clip_title = data_json[count].branch_id;
                        var n_clip_data = data_json[count].branch_name;
                        var n_clip_dead = data_json[count].dead;

                        branch_array.push(n_clip_data);

                        count++;

                    } catch (e) {
                        populateBranchNames(id_to_populate);
                        return;
                    }
                }
                count = 0;

            } else {
                console.log("success : " + data_json.success);
                console.log("error : " + data_json.error);
            }
        });
}

