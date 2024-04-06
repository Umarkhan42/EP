// Initialize EmailJS
const serviceID = 'service_1cr1ucg';
const templateID = 'template_y2f4buz';
const publicKey = '6CAa8rXRoiBxmNaJe';

emailjs.init(publicKey);

document.addEventListener('DOMContentLoaded', () => 
{
    const form = document.getElementById('contactForm');

    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent the default form submission

        // Collect data to send, note the change to 'username'
        const username = document.getElementById('username').value;
        const issue = document.getElementById('issue').value;

        console.log(username);
        console.log(issue);

        // Prepare the data in the format expected by your EmailJS template
        // Make sure your EmailJS template uses 'from_name' or adjust as needed
        const templateParams = {
            from_name: username, // Reflect the change here
            message: issue,
        };

        emailjs.send(serviceID, templateID, templateParams).then(() => {
            console.log('Success');
        });
    });
});

