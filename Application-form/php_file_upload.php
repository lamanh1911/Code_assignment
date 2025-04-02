<!DOCTYPE html>

<head>
    <title>Job Application Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="php_file_upload.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="body-default">
        <form id="applicationForm" method="post" action="php_file_upload_handling.php" novalidate enctype="multipart/form-data">
            <div class="form-header-and-description">
                <div class="header">Job Application Form</div>
                <div class="line"></div>
                <div class="description">Thank you for your interest in working with us. Please check below for available job opportunities that meet your criteria and send your application by filling out the Job Application Form.</div>
            </div>
            <div class="name-field">
                <label>Name<span style="color: red;">*</span></label>
                <div class="name-input">
                    <div class="first-name">
                        <input type="text" id="first" name="first" placeholder="First">
                        <span class="error" id="firstError"></span>
                    </div>
                    <div class="last-name">
                        <input type="text" id="last" name="last" placeholder="Last">
                        <span class="error" id="lastError"></span>
                    </div>
                </div>
            </div>

            <div class="email-field">
                <label>Email<span style="color: red;">*</span></label>
                <div class="email-input">
                    <input type="text" id="mail" name="mail" placeholder="john.doe@example.com">
                    <span class="error" id="mailError"></span>
                </div>
            </div>

            <div class="position-and-date">
                <div class="position">
                    <label>What position are you applying for?<span style="color: red;">*</span></label>
                    <div class="dropdown">
                        <div class="arrow-icon"><i class="arrow down"></i></div>
                        <select name="position" id="position">
                            <option value="" disabled selected>- Select -</option>
                            <option value=1>Senior PHP teamlead</option>
                            <option value=2>CTO</option>
                            <option value=3>CEO</option>
                            <option value=4>IT manager</option>
                            <option value=5>Coach</option>
                        </select>
                    </div>
                    <span class="error" id="positionError"></span>
                </div>
                <div class="available-date">
                    <label>Available date<span style="color: red;">*</span></label>
                    <div class="date-input">
                        <input type="date" id="date" name="date">
                    </div>
                    <span class="error" id="dateError"></span>
                </div>
            </div>

            <div class="current-status" id="status">
                <div class="current-label"><label>What is your current employee status?<span style="color: red;">*</span></label></div>
                <div class="status-1">
                    <div class="employed">
                        <input type="radio" id="employed" name="status" value=1>
                        <label for="employed">Employed</label>
                    </div>
                    <div class="self-employed">
                        <input type="radio" id="self-employed" name="status" value=2>
                        <label for="employed">Self-Employed</label>
                    </div>
                </div>
                <div class="status-2">
                    <div class="unemployed">
                        <input type="radio" id="unemployed" name="status" value=3>
                        <label for="unemployed">Unemployed</label>
                    </div>
                    <div class="student">
                        <input type="radio" id="student" name="status" value=4>
                        <label for="student">Student</label>
                    </div>
                </div>
                <span class="error" id="statusError"></span>
            </div>

            <div class="resume">
                <div class="resume-link">
                    <label>Please provide your resume link<span style="color: red;">*</span></label>
                    <div class="link">
                        <input type="text" placeholder="https://www.example.com/" id="link" name="link">
                    </div>
                    <span class="error" id="linkError"></span>
                </div>
                <div class="resume-upload">
                    <label>Please upload your resume<span style="color: red;">*</span></label>
                    <div class="upload">
                        <input type="text" id="fileName" placeholder="Resume" readonly="readonly">
                        <div class="click-to-upload" id="uploadBtn">
                            <input type="file" id="fileInput" name="file">
                            <i class="fa fa-upload"></i>
                        </div>
                        <div class="click-to-delete" id="deleteUpload">
                            <span class="delete-icon">x</span>
                        </div>
                    </div>
                    <span class="error" id="fileError"></span>
                </div>
            </div>

            <div class="references">
                <label>Do you have refereneces? (optional)</label>
                <div class="name-input">
                    <div class="first-name">
                        <input type="text" placeholder="First" name="referFirst">
                    </div>
                    <div class="last-name">
                        <input type="text" placeholder="Last" name="referLast">
                    </div>
                </div>
            </div>

            <div class="email-reference">
                <label>Reference email</label>
                <div class="email-input">
                    <input type="text" id="referenceMail" name="referenceMail" placeholder="john.doe@example.com">
                </div>
                <span class="error" id="referenceMailError"></span>
            </div>
            <button style="background-color: white" id="resetForm" type="button">Reset</button>
            <button id="submit" type="submit" style="background-color: black; color:white">Apply</button>
        </form>
    </div>
    <script src="php_file_upload.js"></script>
</body>

</html>