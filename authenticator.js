// Sent to seperate 2fa page: ✔

// Random 6 digit Code will be sent to the email that is linked to the account ✔

// 5 minute timer starts ✔

// if user puts the correct code in within the timer - logged in succesful ✔

// if user does not put correct code but within timer say timer ran out - reset your code ✔

// if user fails 3rd attempt, lock account ✔

// if succesful - logged into their respective account ✔

//resend code ✔

//reset timer to the correct one

let attempts = 0; //initialise attempts to 0
let timer;
const duration = 3 * 60 * 1000; 
let email = document.getElementById('email');
let currentRemainingTime;

const serviceID = 'service_rtls3d8';
const templateID = 'template_iycq7cd';
const publicKey = 'HCe6yEnLrSL_pgTyZ';

emailjs.init(publicKey);

function sendCode()
{
    
    const generatedCode = generateRandomCode();

    // Store the generated code in a data attribute of the button
    sendCodeButton.setAttribute('data-code', generatedCode);

    const inputData = 
    {
        emailInput: email.value, 
        code: generatedCode, // Pass the generated code to the email input field
    };

    emailjs.send(serviceID, templateID, inputData).then(() => 
    {
        console.log('Success');
    });

    startTimer(duration);
}

//Function to start 5-minute timer
function startTimer(duration) 
{
    let displayTimer = document.getElementById("timer");
    let remainingTime = duration;
    
    timer = setInterval(() => 
    {
        const minutes = Math.floor(remainingTime / 60000);
        const seconds = Math.floor((remainingTime % 60000) / 1000);
        
        // Display the timer
        displayTimer.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        currentRemainingTime = remainingTime;

        if (remainingTime <= 0) 
        {
            clearInterval(timer);
            console.log("Timer expired");
        } else 
        {
            remainingTime -= 1000;
        }
    }, 1000);
}



// Function to generate a random 6-digit code
function generateRandomCode() 
{
    const randomNum = Math.floor(Math.random() * 900000) + 100000;
    return randomNum.toString();
}

// Function to verify the input code
function verifyCode(input_code) 
{
    const maxAttempts = 3;
    const generatedCode = sendCodeButton.getAttribute('data-code');
    console.log(currentRemainingTime);

    if (input_code === generatedCode && currentRemainingTime > 0) 
    {
        console.log("Logged in successfully");
        // Access the role directly here
        var role = document.getElementById('role').innerText;
        console.log(role);
        switch (role){
            case "Internal Staff":
                window.location.href = "internalStaffHP.php";
                break;
            case "Consultant":
                window.location.href = "consultantsHP.php";
                break;
            case"Trainer":
                window.location.href = "trainerHP.php";
                break;
            default:
                console.log("Unknown role");
                break;

        }
    } 

    //regardless of code input, user cannot login after time has exceeded the limit
    else if (currentRemainingTime <= 0)
    {
        console.log("Time ran out! Please resend the code!");
    }

    else 
    {
        attempts++;
        console.log("Wrong code!");

        if (attempts === maxAttempts) 
        {
            lockAccount();
        }
    }
}

// // create an event listener for resend
// resendButton.addEventLister("click")
// {
//     clearInterval(timer);
//     attempts = 0; //attempts get reset
// }
// // if its clicked reset the timer




//Function to lock account
function lockAccount()
{
    console.log("Account locked")
}

function resendCode()
{
    clearInterval(timer);
    attempts = 0;

    const generatedCode = generateRandomCode();

    // Store the generated code in a data attribute of the button
    sendCodeButton.setAttribute('data-code', generatedCode);

    const inputData = 
    {
        emailInput: email.value, 
        code: generatedCode, // Pass the generated code to the email input field
    };

    emailjs.send(serviceID, templateID, inputData).then(() => 
    {
        console.log('Success');
    });

    startTimer(duration);
}

//var code = 0

// const setEmails = user1;
// attempts = 0;
// let interval;

// function clearTimer(){
//     clearInterval(interval)
// }

// function lockAccount() {
//     console.log("Account locked");
//     clearTimer();
// }

// function codeUnsuccessful()
// {
//     attempts = attempts + 1
//     maxAttempts = 3

//     if(attempts >= maxAttempts)
//     {
//     lockAccount();
//     }
//     else{
//         console.log("Incorrect code")
//     }
// }

// function verifyCode(input_code, code)
// {
//     if(input_code == code)
//     {
//         console.log("Logged in successfully");
//         clearTimer();
//     }
//     else
//     {
//         codeUnsuccessful();
//     }
// }
// function resendCode()
// {

// }