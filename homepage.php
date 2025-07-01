<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pre-Enrollment Homepage</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3eee9;
        }

        .header-panel {
            background-color: #14361c;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .header-panel img {
            height: 120px;
            margin-bottom: 10px;
        }

        .notice-bar {
            background-color: #f1bd3c;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 30px;
            max-width: 1400px;
            margin: 30px auto;
        }

        .nav-vertical {
            display: flex;
            flex-direction: column;
            gap: 10px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .nav-btn {
            background-color: transparent;
            color: #000;
            padding: 12px 20px;
            border: none;
            border-bottom: 4px solid transparent;
            border-radius: 5px;
            cursor: pointer;
            font-weight: regular;
            font-family: Arial,sans-serif;
            font-size: 16px;
            text-align: left;
            transition: border-color 0.3s, background-color 0.2s;
        }

        .nav-btn:hover {
            background-color: #f0f0f0;
        }

        .nav-btn.active {
            border-bottom: 4px solid #28a745;
            background-color: #e5f8ec;
        }

        .content-area {
            flex: 1;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            min-height: 300px;
        }

    </style>
</head>
<body>

    <div class="header-panel">
        <img src="./assets/University_of_San_Jose–Recoletos_logo.png" alt="School Logo">
        <p style="font-size: 28px; font-weight: bold;">Pre-Enrollment System</p>
    </div>

    <div class="notice-bar"></div>

    <div class="container">
        <!-- Sidebar Navigation -->
        <div class="nav-vertical">
            <button class="nav-btn" onclick="resetContent(this)">Home</button>
            <button class="nav-btn" onclick="loadPage('add_student', this)">Add Student</button>
            <button class="nav-btn" onclick="loadPage('add_adviser', this)">Add Adviser</button>
            <button class="nav-btn" onclick="loadPage('add_subjects', this)">Add Subject</button>
            <button class="nav-btn" onclick="loadPage('add_offer', this)">Add Offer</button>
            <button class="nav-btn" onclick="loadPage('view_subjects_offer', this)">View Subjects and Offers</button>
            <button class="nav-btn" onclick="loadPage('add_grade', this)">Add Grade</button>
            <button class="nav-btn" onclick="loadPage('view_grade', this)">View Grade List</button>
            <button class="nav-btn" onclick="loadPage('add_department', this)">Add Department</button>
            <button class="nav-btn" onclick="loadPage('add_college', this)">Add College</button>
        </div>

        <!-- Main Content Display Area -->
        <div class="content-area" id="main-content">
            <p><em>Welcome to the Pre-Enrollment System. Use the navigation menu to continue.</em></p>
        </div>
    </div>
    <div id="toast" style="
        visibility: hidden;
        min-width: 250px;
        background-color: #28a745;
        color: white;
        text-align: center;
        border-radius: 4px;
        padding: 12px;
        position: fixed;
        z-index: 1000;
        left: 50%;
        bottom: 30px;
        font-size: 16px;
        transform: translateX(-50%);
        opacity: 0;
        transition: opacity 0.5s ease, visibility 0.5s;
    ">
    </div>


    <script>
        function setActiveButton(btn) {
            document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        }

        function resetContent(btn) {
            setActiveButton(btn);
            document.getElementById('main-content').innerHTML =
                `<p><em>Welcome to the Pre-Enrollment System. Use the navigation menu to continue.</em></p>`;
        }

        function loadPage(page, btn) {
            setActiveButton(btn);
            fetch(`views/${page}.php`)
                .then(response => response.text())
                .then(html => {
                    const contentArea = document.getElementById('main-content');
                    contentArea.innerHTML = html;

                    // ✅ Bind form handlers dynamically
                    if (page === 'add_student') bindAddStudentForm();
                    else if (page === 'add_adviser') bindAddAdviserForm();
                    else if (page === 'add_subjects') bindAddSubjectForm(); 
                    else if (page === 'add_offer') bindAddOfferForm();
                    else if (page === 'add_grade') bindAddGradeForm();
                    else if (page === 'add_department') bindAddDepartmentForm();
                    else if (page === 'add_college') bindAddCollegeForm();
                })
                .catch(error => {
                    document.getElementById('main-content').innerHTML =
                        `<p style="color: red;">Error loading content: ${error.message}</p>`;
                });
        }

        // ✅ Shared toast setup
        if (!document.getElementById("popup")) {
            const toast = document.createElement("div");
            toast.id = "popup";
            toast.style = `
                visibility: hidden;
                min-width: 250px;
                background-color: #28a745;
                color: white;
                text-align: center;
                border-radius: 4px;
                padding: 12px;
                position: fixed;
                z-index: 1000;
                left: 50%;
                bottom: 30px;
                font-size: 16px;
                transform: translateX(-50%);
                opacity: 0;
                transition: opacity 0.5s ease, visibility 0.5s;
            `;
            document.body.appendChild(toast);
        }

        function showToast(message, bgColor) {
            const toast = document.getElementById("popup");
            toast.textContent = message;
            toast.style.backgroundColor = bgColor;
            toast.classList.add("show");
            toast.style.visibility = "visible";
            toast.style.opacity = "1";

            setTimeout(() => {
                toast.classList.remove("show");
                toast.style.visibility = "hidden";
                toast.style.opacity = "0";
            }, 3000);
        }

        function bindAddStudentForm() {
            const form = document.getElementById("addStudentForm");
            if (!form) return;

            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                fetch("/preenrollment_db/controllers/StudentController.php?action=submit", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        showToast("✅ Student successfully added!", "#28a745");
                        form.reset();
                    } else {
                        showToast("❌ Failed to add student.", "#dc3545");
                    }
                })
                .catch(err => {
                    console.error("Student AJAX error:", err);
                    showToast("❌ Error in database occurred.", "#dc3545");
                });
            });
        }

        function bindAddAdviserForm() {
            const form = document.getElementById("addAdviserForm");
            if (!form) return;

            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                fetch("/preenrollment_db/controllers/AdviserController.php?action=submit", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        showToast("✅ Adviser successfully added!", "#28a745");
                        form.reset();
                    } else {
                        showToast("❌ Failed to add adviser.", "#dc3545");
                    }
                })
                .catch(err => {
                    console.error("Adviser AJAX error:", err);
                    showToast("❌ Error in database occurred.", "#dc3545");
                });
            });
        }

        function bindAddSubjectForm() {
            const form = document.getElementById("addSubjectForm");
            if (!form) return;

            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                fetch("/preenrollment_db/controllers/SubjectsController.php?action=submit", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        showToast("✅ Subject successfully added!", "#28a745");
                        form.reset();
                    } else {
                        showToast("❌ Failed to add adviser.", "#dc3545");
                    }
                })
                .catch(err => {
                    console.error("Subject AJAX error:", err);
                    showToast("❌ Error in database occurred.", "#dc3545");
                });
            });
        }

        function bindAddOfferForm() {
            const form = document.getElementById("addOfferForm");
            if (!form) return;

            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                fetch("/preenrollment_db/controllers/OfferController.php?action=submit", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        showToast("✅ Offer successfully added!", "#28a745");
                        form.reset();
                    } else {
                        showToast("❌ Failed to add Offer.", "#dc3545");
                    }
                })
                .catch(err => {
                    console.error("Offer AJAX error:", err);
                    showToast("❌ Error in database occurred.", "#dc3545");
                });
            });
        }

        function bindAddGradeForm() {
            const form = document.getElementById("addGradeForm");
            if (!form) return;

            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                fetch("/preenrollment_db/controllers/GradeController.php?action=submit", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        showToast("✅ Grade successfully added!", "#28a745");
                        form.reset();
                    } else {
                        showToast("❌ Failed to add Grade.", "#dc3545");
                    }
                })
                .catch(err => {
                    console.error("Grade AJAX error:", err);
                    showToast("❌ Error in database occurred.", "#dc3545");
                });
            });
        }

        function bindAddDepartmentForm() {
            const form = document.getElementById("addDepartmentForm");
            if (!form) return;

            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                fetch("/preenrollment_db/controllers/DepartmentController.php?action=submit", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        showToast("✅ Department successfully added!", "#28a745");
                        form.reset();
                    } else {
                        showToast("❌ Failed to add Department.", "#dc3545");
                    }
                })
                .catch(err => {
                    console.error("Department AJAX error:", err);
                    showToast("❌ Error in database occurred.", "#dc3545");
                });
            });
        }

        function bindAddCollegeForm() {
            const form = document.getElementById("addCollegeForm");
            if (!form) return;

            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                fetch("/preenrollment_db/controllers/CollegeController.php?action=submit", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        showToast("✅ College successfully added!", "#28a745");
                        form.reset();
                    } else {
                        showToast("❌ Failed to add College.", "#dc3545");
                    }
                })
                .catch(err => {
                    console.error("College AJAX error:", err);
                    showToast("❌ Error in database occurred.", "#dc3545");
                });
            });
        }
    </script>




</body>
</html>
