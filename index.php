

<!DOCTYPE html>
<html>
    <head>
        <title> US Geography Quiz </title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" ></script> 
        <script>
            /*global $*/
            $(document).ready(function(){
                
                //Global variables
                var score = 0;
                var attempts = localStorage.getItem("total_attempts");
                
                $("#submitButton").on( "click", gradeQuiz);
                
                $(".q5Choice").on( "click", function() {
                    $(".q5Choice").css("background","");
                    $(this).css("background","rgb(200, 150, 50)");
                });
                
                $(".q10Choice").on( "click", function() {
                    $(".q10Choice").css("background","");
                    $(this).css("background","rgb(200, 150, 50)");
                });

                displayQ4Choices();
                
                //displayQ4Choices
                function displayQ4Choices(){
                    let q4ChoicesArray = ["Maine", "Rhode Island", "Maryland", "Delaware"];
                    q4ChoicesArray = _.shuffle(q4ChoicesArray);
                    
                    for (let i=0; i < q4ChoicesArray.length; i++) {
                        $("#q4Choices").append(` <input type="radio" name="q4"
                        id="${q4ChoicesArray[i]}" value="${q4ChoicesArray[i]}">
                        <label for="${q4ChoicesArray[i]}"> ${q4ChoicesArray[i]} &nbsp</label>`);
                    }
                }
                
                function isFormValid(){
                    let isValid = true;
                    
                    
                    //Question1 validation
                    if ($("#q1").val() == "") {
                        isValid = false;
                        unanswered(1);
                    }
                    
                    //Question2 validation
                    if ($("#q2").val() == "") {
                        isValid = false;
                        unanswered(2);
                    }
                    
                    //Question3 validation
                    if (!$("#Jefferson").is(":checked") && !$("#Roosevelt").is(":checked")
                        && !$("#Jackson").is(":checked")&& !$("#Franklin").is(":checked")){
                        isValid = false;
                        unanswered(3);
                    }
                    
                    //Question4 validation
                    if ($("input[name=q4]:checked").val() == null) {
                        isValid = false;
                        unanswered(4);
                    }
                    
                    //Question5 validation
                    if (($("#seal1").css("background-color") != "rgb(200, 150, 50)")
                        && ($("#seal2").css("background-color") != "rgb(200, 150, 50)")
                        && ($("#seal3").css("background-color") != "rgb(200, 150, 50)")) {
                        isValid = false;
                        unanswered(5);
                    }
                    
                    //Question6 validation
                    if ($("#q6").val() == "") {
                        isValid = false;
                        unanswered(6);
                    }
                    
                    //Question7 validation
                    if ($("#q7").val() == "") {
                        isValid = false;
                        unanswered(7);
                    }
                    
                    //Question8 validation
                    if (!$("#Rocky").is(":checked") && !$("#Appalachian").is(":checked")
                        && !$("#Ural").is(":checked")&& !$("#Atlas").is(":checked")){
                        isValid = false;
                        unanswered(8);
                    }
                    
                    //Question9 validation
                    if ($("input[name=q9]:checked").val() == null) {
                        isValid = false;
                        unanswered(9);
                    }
                    
                    //Question10 validation
                    if (($("#eagle").css("background-color") != "rgb(200, 150, 50)")
                        && ($("#condor").css("background-color") != "rgb(200, 150, 50)")
                        && ($("#peacock").css("background-color") != "rgb(200, 150, 50)")) {
                        isValid = false;
                        unanswered(10);
                    }
                    
                    if (!isValid)
                        $("#validationFdbk").html("Not all questions answered");
                        
                    return isValid;
                }
                
                function rightAnswer(index){
                    $(`#q${index}Feedback`).html("Correct!");
                    $(`#q${index}Feedback`).attr("class", "bg-success text-white");
                    $(`#markImg${index}`).html("<img src ='img/checkmark.png' alt='checkmark'>");
                    score +=10;
                }
                
                function wrongAnswer(index){
                    $(`#q${index}Feedback`).html("Incorrect!");
                    $(`#q${index}Feedback`).attr("class", "bg-danger text-white");
                    $(`#markImg${index}`).html("<img src ='img/xmark.png' alt='xmark'>");
                }
                
                function unanswered(index){
                    $(`#q${index}Feedback`).html("Not answered!");
                    $(`#q${index}Feedback`).attr("class", "bg-warning text-white");
                    $(`#markImg${index}`).html("");
                }
                
                function gradeQuiz(){
                    
                    $("#validationFdbk").html("");
                    
                    for ( let i=1; i<=10; i++) {
                        $(`#q${i}Feedback`).html("");
                        $(`#q${i}Feedback`).attr("class", "bg-white text-white");
                        $(`#markImg${i}`).html("");
                    }
                    
                    if (!isFormValid()) {
                        return;
                    }
                    
                    score = 0;
                    let q1Response = $("#q1").val().toLowerCase();
                    let q2Response = $("#q2").val();
                    let q4Response = $("input[name=q4]:checked").val();
                    let q6Response = $("#q6").val().toLowerCase();
                    let q7Response = $("#q7").val();
                    let q9Response = $("input[name=q9]:checked").val();
                    
                    //Question 1
                    if(q1Response == "sacramento") {
                        rightAnswer(1);
                    }
                    else {
                        wrongAnswer(1);
                    }
                    
                    //Question 2
                    if (q2Response == "mo") {
                        rightAnswer(2);
                    }
                    else {
                        wrongAnswer(2);
                    }
                    
                    //Question 3
                    if ($("#Jefferson").is(":checked") && $("#Roosevelt").is(":checked")
                        && !$("#Jackson").is(":checked")&& !$("#Franklin").is(":checked")){
                        rightAnswer(3);
                    }
                    else {
                        wrongAnswer(3);
                    }
                    
                    //Question 4
                    if (q4Response == "Rhode Island") {
                        rightAnswer(4);
                    }
                    else {
                        wrongAnswer(4);
                    }
                    
                    //Question 5
                    if ($("#seal2").css("background-color") == "rgb(200, 150, 50)") {
                        rightAnswer(5);
                    }
                    else {
                        wrongAnswer(5);
                    }
                    
                    //Question 6
                    if(q6Response == "alaska") {
                        rightAnswer(6);
                    }
                    else {
                        wrongAnswer(6);
                    }
                    
                    //Question 7
                    if (q7Response == "50") {
                        rightAnswer(7);
                    }
                    else {
                        wrongAnswer(7);
                    }
                    
                    //Question 8
                    if ($("#Appalachian").is(":checked") && $("#Rocky").is(":checked")
                        && !$("#Ural").is(":checked")&& !$("#Atlas").is(":checked")){
                        rightAnswer(8);
                    }
                    else {
                        wrongAnswer(8);
                    }
                    
                    //Question 9
                    if (q9Response == "Washington D.C.") {
                        rightAnswer(9);
                    }
                    else {
                        wrongAnswer(9);
                    }
                    
                    //Question 10s
                    if ($("#eagle").css("background-color") == "rgb(200, 150, 50)") {
                        rightAnswer(10);
                    }
                    else {
                        wrongAnswer(10);
                    }
                    
                    if (score >= 80) {
                        $("#totalScore").css("color","green");
                        $("#congratsField").css("color","green");
                        $("#congratsField").html(`Congrats!`);
                    }
                    else {
                        $("#totalScore").css("color","red");
                        $("#congratsField").html(``);
                    }
                    $("#totalScore").html(`Total Score: ${score}`);
                    $("#totalAttempts").html(`Total Attempts: ${++attempts}`);
                    localStorage.setItem("total_attempts", attempts);
                }
            });
            

        </script>
    </head>
    <body class="text-center">
            
        <h1 class="jumbotron"> US Geography Quiz </h1>
        
        <h3><span id="markImg1"></span>  What is the capital of California?</h3>
        <input type="text" id="q1">
        <br><br>
        <div id="q1Feedback"></div>
        <br>
        
        <h3><span id="markImg2"></span>  What is the longest river?</h3>
        <select id="q2">
            <option value="">Select One</option>
            <option value="ms">Mississippi</option>
            <option value="mo">Missouri</option>
            <option value="co">Colorado</option>
            <option value="de">Delaware</option>
        </select>
        <br><br>
        <div id="q2Feedback"></div>
        <br>
        
        <h3><span id="markImg3"></span>  What presidents are carved into mount Rushmore?</h3>
        <input type="checkbox" id="Jackson"><label for="Jackson">&nbspA.Jackson&nbsp</label>
        <input type="checkbox" id="Franklin"><label for="Franklin">&nbspB. Franklin&nbsp</label>
        <input type="checkbox" id="Jefferson"><label for ="Jefferson">&nbspT. Jefferson&nbsp</label>
        <input type="checkbox" id="Roosevelt"><label for ="Roosevelt">&nbspT. Roosevelt&nbsp</label>
        <br><br>
        <div id = "q3Feedback"></div>
        <br>
        
        <h3><span id="markImg4"></span>  What is the smallest US State?</h3>
        <div id="q4Choices"></div>
        <br>
        <div id ="q4Feedback"></div>
        <br>
        
        <h3><span id="markImg5"></span>  What image is in the Great Seal of the State of California?</h3>
        <img src="img/seal1.png" alt="Seal 1" class="q5Choice" id="seal1">
        <img src="img/seal2.png" alt="Seal 2" class="q5Choice" id="seal2">
        <img src="img/seal3.png" alt="Seal 3" class="q5Choice" id="seal3">
        <br><br>
        <div id = "q5Feedback"></div>
        <br>
        
        <h3><span id="markImg6"></span>  What is the northernmost state?</h3>
        <input type="text" id="q6">
        <br><br>
        <div id="q6Feedback"></div>
        <br>
        
        <h3><span id="markImg7"></span>  What is the number of states?</h3>
        <select id="q7">
            <option value="">Select One</option>
            <option value="29">29</option>
            <option value="37">37</option>
            <option value="45">45</option>
            <option value="50">50</option>
        </select>
        <br><br>
        <div id="q7Feedback"></div>
        <br>
        
        <h3><span id="markImg8"></span>  Which of these mountain ranges are present?</h3>
        <input type="checkbox" id="Appalachian"><label for="Appalachian">&nbspAppalachian&nbsp</label>
        <input type="checkbox" id="Ural"><label for ="Ural">&nbspUral&nbsp</label>
        <input type="checkbox" id="Rocky"><label for="Rocky">&nbspRocky&nbsp</label>
        <input type="checkbox" id="Atlas"><label for ="Atlas">&nbspAtlas&nbsp</label>
        <br><br>
        <div id = "q8Feedback"></div>
        <br>
        
        <h3><span id="markImg9"></span>  What is the US capital city?</h3>
        <input type="radio" name="q9" id="la" value="Los Angeles"><label for="la">&nbspLos Angeles&nbsp</label>
        <input type="radio" name="q9" id="ny" value="New York City"><label for="ny">&nbspNew York City&nbsp</label>
        <input type="radio" name="q9" id="dc" value="Washington D.C."><label for="dc">&nbspWashington D.C.</label>
        <input type="radio" name="q9" id="bo" value="Boston"><label for="bo">&nbspBoston&nbsp</label>
        <br><br>
        <div id ="q9Feedback"></div>
        <br>
        
        <h3><span id="markImg10"></span>  What image represents the national symbol?</h3>
        <img src="img/condor.png" alt="condor" class="q10Choice" id="condor">
        <img src="img/peacock.png" alt="peacock" class="q10Choice" id="peacock">
        <img src="img/eagle.png" alt="eagle" class="q10Choice" id="eagle">
        <br><br>
        <div id = "q10Feedback"></div>
        <br>
        
        <h3 id="validationFdbk" class="bg-warning test-white"></h3>
        <br>
        <button id="submitButton" class="btn btn-outline-primary">Submit</button>
        <br><br>
        <h3 id="totalScore" class="test-info"></h3>
        <h2 id="congratsField" class="test-info"></h2>
        <br>
        <h3 id="totalAttempts" class="test-info"></h3></h3>
        
        <footer>
            <hr>
            CST 336 - 2020&copy; Josh Hansen<br>
            <strong>Disclaimer:</strong> The information in this website is fictitious.<br>
            It is used for academic purposes only.<br>
            <br>
            <img src="img/csumblogo.png" alt="CSUMB Logo">

        </footer>
    </body>
</html>