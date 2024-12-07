function tProductImage(x) {

    var image = document.getElementById("img_input_" + x);
    image.click();

    image.onchange = function () {
        var file_count = image.files.length;
        if (file_count == 1) {
            var file = image.files[0];
            var url = window.URL.createObjectURL(file);
            document.getElementById("img_span_" + x).className = "d-none";
            document.getElementById("img_div_" + x).src = url;

        } else {
            alert("Please select an image.");
        }
    }

}

function tUpdateImage(x) {

    var image = document.getElementById("img_update_" + x);
    image.click();

    image.onchange = function () {
        var file_count = image.files.length;
        if (file_count == 1) {
            var file = image.files[0];
            var url = window.URL.createObjectURL(file);
            document.getElementById("update_span_" + x).className = "d-none";
            document.getElementById("update_div_" + x).src = url;

        } else {
            alert("Please select an image.");
        }
    }

}

function changevm() {

    var vision_txt = document.getElementById("vision_txt").value;
    var mission_txt = document.getElementById("mission_txt").value;

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("vision", vision_txt);
    form.append("mission", mission_txt);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            alert(r.responseText);
        }
    }
    r.open("POST", "update-vm-process.php", true);
    r.send(form);

}

function change_branch() {

    var bid = document.getElementById("bid").value;
    var bname = document.getElementById("branch_name");
    var bnum = document.getElementById("branch_number");
    var baddress = document.getElementById("branch_address");

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("bid", bid);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            try {
                var jsonData = JSON.parse(r.responseText);
                var firstObject = jsonData[0];
                bname.value = firstObject.brc_name;
                bnum.value = firstObject.brc_num;
                baddress.value = firstObject.brc_address;
                return true;
            } catch (e) {
                alert(r.responseText);
                return false;
            }
        }
    }
    r.open("POST", "change-branch-process.php", true);
    r.send(form);

}

function list_dprice() {

    var cid = document.getElementById("c_id").value;
    var cid2 = document.getElementById("c_id2").value;
    var x = document.getElementById("d_price");

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("cid", cid);
    form.append("cid2", cid2);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            if (r.responseText == "Please select a city.") {
                x.value = null;
            } else if (r.responseText == "nc") {
                x.value = null;
            } else if (isNaN(r.responseText)) {
                x.value = null;
                alert(r.responseText);
            } else {
                x.value = r.responseText;
            }
        }
    }
    r.open("POST", "change-dcharge-process.php", true);
    r.send(form);

}

function list_town() {

    var did = document.getElementById("ad_id").value;

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("did", did);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            if (r.responseText == "Error") {
                document.getElementById("at_id").value = null;
            } else if (r.responseText == "Please select a ditsrict.") {
                document.getElementById("at_id").value = null;
            } else {
                document.getElementById("at_id").innerHTML = r.responseText;
            }
        }
    }
    r.open("POST", "change-city-process.php", true);
    r.send(form);

}

var town_col_count = 0;
function add_town_col() {
    var town_col = document.getElementById("town_col");
    if (town_col_count <= 5) {
        town_col_count = town_col_count + 1;
        town_col.innerHTML += "<div class='col-6 col-md-4'>" +
            "<div class='form-floating mb-3'>" +
            "<input type='text' class='form-control rounded-0' id='tc_" + town_col_count + "' value='' placeholder='charges'>" +
            "<label for=''>Town " + town_col_count + " name</label>" +
            "</div>" +
            "</div>";
    } else {
        alert("A maximum of six towns can be added at a time.");
    }


}

function add_new_town() {

    var did = document.getElementById("ad_id").value;

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("did", did);

    var tnid = [];
    for (let i = 1; i <= town_col_count; i++) {
        tnid[i] = document.getElementById("tc_" + i).value;
        form.append("tnid"+i, tnid[i]);
    }
    form.append("town_col_count", town_col_count);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            alert(r.responseText);
            if(r.responseText=="Towns added successfully !"){
                location.reload();
            }
        }
    }
    r.open("POST", "add-new-city-process.php", true);
    r.send(form);

}

function update_dprice() {

    var cid = document.getElementById("c_id").value;
    var cid2 = document.getElementById("c_id2").value;
    var d_price = document.getElementById("d_price").value;

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("cid", cid);
    form.append("cid2", cid2);
    form.append("d_price", d_price);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            alert(r.responseText);
            if (r.responseText == "Delivey charges updated.") {
                location.reload();
            }
        }
    }
    r.open("POST", "add-dcharge-process.php", true);
    r.send(form);

}

function update_branch() {

    var branch_id = document.getElementById("bid").value;
    var branch_name = document.getElementById("branch_name").value;
    var branch_number = document.getElementById("branch_number").value;
    var branch_address = document.getElementById("branch_address").value;

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("branch_id", branch_id);
    form.append("branch_name", branch_name);
    form.append("branch_number", branch_number);
    form.append("branch_address", branch_address);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            alert(r.responseText);
        }
    }
    r.open("POST", "update-branch-process.php", true);
    r.send(form);

}

function change_email() {

    var email = document.getElementById("contact_email").value;

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("email", email);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            alert(r.responseText);
        }
    }

    r.open("POST", "update-email-process.php", true);
    r.send(form);

}

function tBlogImage() {

    var image = document.getElementById("blog_img_input");
    image.click();

    image.onchange = function () {
        var file_count = image.files.length;
        if (file_count == 1) {
            var file = image.files[0];
            var url = window.URL.createObjectURL(file);
            document.getElementById("blog_img_span").className = "d-none";
            document.getElementById("blog_img_div").src = url;

        } else {
            alert("Please select an image.");
        }
    }

}

function add_new_blog() {

    var b_id = document.getElementById("b_id");
    var b_name = document.getElementById("b_name");
    var b_body = document.getElementById("b_body");
    var b_img = document.getElementById("blog_img_input");

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("b_id", b_id.value);
    form.append("b_name", b_name.value);
    form.append("b_body", b_body.value);

    var image_file_count = b_img.files.length;
    if (image_file_count == 1) {
        form.append("b_img", b_img.files[0]);

        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                alert(r.responseText);
                if (r.responseText == "New Blog added Successfully.") {
                    location.reload();
                }
            }
        }

        r.open("POST", "addblog-process.php", true);
        r.send(form);

    } else {
        alert("Please selct an image.");
    }

}

function addOrDeleteBlog() {

    var bid = document.getElementById("b_id");
    if (bid.value == 0) {
        document.getElementById("add_blog_div").className = "col-12";
        document.getElementById("delete_blog_div").className = "d-none";
    } else {
        document.getElementById("add_blog_div").className = "d-none";
        document.getElementById("delete_blog_div").className = "col-12 text-center";
    }
}

function delete_blog() {

    var bid = document.getElementById("b_id").value;

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("b_id", bid);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {

            if (r.responseText == "Blog Deleted Successfully") {
                location.reload();
            } else {
                alert(r.responseText);
            }

        }
    }

    r.open("POST", "delete-blog-process.php", true);
    r.send(form);

}

function tNewsImage() {

    var image = document.getElementById("news_img_input");
    image.click();

    image.onchange = function () {
        var file_count = image.files.length;
        if (file_count == 1) {
            var file = image.files[0];
            var url = window.URL.createObjectURL(file);
            document.getElementById("news_img_span").className = "d-none";
            document.getElementById("news_img_div").src = url;

        } else {
            alert("Please select an image.");
        }
    }

}

function add_new_news() {

    var n_id = document.getElementById("n_id");
    var n_name = document.getElementById("n_name");
    var n_body = document.getElementById("n_body");
    var n_img = document.getElementById("news_img_input");

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("n_id", n_id.value);
    form.append("n_name", n_name.value);
    form.append("n_body", n_body.value);

    var image_file_count = n_img.files.length;
    if (image_file_count == 1) {
        form.append("n_img", n_img.files[0]);

        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                alert(r.responseText);
                if (r.responseText == "New News added Successfully.") {
                    location.reload();
                }
            }
        }

        r.open("POST", "addnews-process.php", true);
        r.send(form);

    } else {
        alert("Please selct an image.");
    }

}

function addOrDeleteNews() {

    var nid = document.getElementById("n_id");
    if (nid.value == 0) {
        document.getElementById("add_news_div").className = "col-12";
        document.getElementById("delete_news_div").className = "d-none";
    } else {
        document.getElementById("add_news_div").className = "d-none";
        document.getElementById("delete_news_div").className = "col-12 text-center";
    }
}

function delete_news() {

    var nid = document.getElementById("n_id").value;

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("n_id", nid);

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {

            if (r.responseText == "News Deleted Successfully") {
                location.reload();
            } else {
                alert(r.responseText);
            }

        }
    }

    r.open("POST", "delete-news-process.php", true);
    r.send(form);

}

function triggerFileInput() {
    document.getElementById('newsFileInput').click();
}

function update_product(pid) {
    var pld = tinymce.get('pld' + pid).getContent();
    var psd = tinymce.get(pid + 'psd').getContent();

    var sku = document.getElementById(pid + "sku");
    var pt = document.getElementById(pid + "pt");
    var pc = document.getElementById(pid + "pc");
    var pp = document.getElementById(pid + "pp");
    var pq = document.getElementById(pid + "pq");
    var ps = document.getElementById(pid + "ps");

    var img1 = document.getElementById("img_update_" + pid + "1");
    var img2 = document.getElementById("img_update_" + pid + "2");
    var img3 = document.getElementById("img_update_" + pid + "3");

    var r = new XMLHttpRequest();
    var form = new FormData();
    form.append("pid", pid);
    form.append("sku", sku.value);
    form.append("pt", pt.value);
    form.append("pc", pc.value);
    form.append("pp", pp.value);
    form.append("pq", pq.value);
    form.append("ps", ps.value);
    form.append("psd", psd);
    form.append("pld", pld);

    var image_file_count1 = img1.files.length;
    var image_file_count2 = img2.files.length;
    var image_file_count3 = img3.files.length;

    if (image_file_count1 == 1) {
        form.append("img1", img1.files[0]);
    }
    if (image_file_count2 == 1) {
        form.append("img2", img2.files[0]);
    }
    if (image_file_count3 == 1) {
        form.append("img3", img3.files[0]);
    }

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            alert(r.responseText);
            if (r.responseText == 'Product has been updated.') {
                window.location.reload();
            }
        }
    }

    r.open("POST", "update-product-process.php", true);
    r.send(form);


}

function adminLogin() {
    var username = document.getElementById("u");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("u", username.value);
    form.append("p", password.value);

    var x = new XMLHttpRequest();


    x.onreadystatechange = function () {
        if (x.readyState == 4 && x.status == 200) {
            var response = x.responseText;
            if (response === "success") {
                window.location = "admin.php";
            } else {
                alert(response);
            }
        }
    };

    x.open("POST", "adminLoginprocess.php", true);
    x.send(form);
}

function admin_logout() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            if (r.responseText == "done") {
                window.location.href = "authentication-login.php";
            } else if (r.responseText == "Something went wrong !") {
                location.reload();
            }
        }
    }

    r.open("POST", "admin-logout.php", true);
    r.send();
}

