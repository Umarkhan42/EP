const chatbotToggler = document.querySelector(".chatbot-toggler");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");

const faqs = {
    "hi": "Hi! How can I help you?",
    "hello": "Hello! How can I assist you today?",
    "how are you": "I'm just a bot, but thank you for asking! How can I assist you?",
    "what is fdm": "FDM is a global organization that provides various training and employment programs for graduates, returners, and ex-forces personnel. We operate in multiple regions worldwide and have a diverse workforce.",
    "where are fdm centers located": "FDM has centers in the UK, Germany, Hong Kong, Singapore, China, Australia, US, and North America. Additionally, we have consultants working with clients across Europe and South Africa.",
    "what programs does fdm offer": "FDM offers three main programs: the Graduate Programme, Returners Programme, and Ex-Forces Programme. Each program follows the Recruit, Train, Deployment model.",
    "how many consultants does fdm have": "FDM has over 3500 consultants working globally with our clients, who are still employed by FDM. Additionally, we have a large internal staff, bringing the total number of FDM employees to 5000+.",
    "what is the fdm employee portal": "The FDM Employee Portal is a platform that allows employees, including internal staff and consultants, to perform various self-service tasks such as updating personal information, booking annual leave, and staying updated with internal news and HR processes.",
    "what tasks can i perform on the employee portal": "You can perform tasks such as updating personal information, booking annual leave, enrolling in training programs, communicating with colleagues and HR, and accessing important company information.",
    "how do i log in to the employee portal": "You can securely log in to the Employee Portal using your unique username and password, or alternatively, you can use your email address along with a password.",
    "how can i contact hr": "If you need assistance with HR-related matters such as benefits, payroll, or employee policies, you can contact the HR department through the Employee Portal. They will provide you with the necessary support and guidance.",
    "how do i reset my password": "If you've forgotten your password for the Employee Portal, you can use the self-service password reset tool, which includes security questions to verify your identity and reduce IT support tickets.",
    "how do i submit my timesheets": "Consultants can submit their timesheets for the projects they are working on through the Employee Portal, ensuring accurate tracking of hours worked.",
    "what training programs are available": "Various training programs are available through the Employee Portal, covering a wide range of topics related to professional development and skills enhancement. You can enroll in programs relevant to your career goals.",
    "how do i manage my expenses": "Consultants can manage and report work-related expenses through the Employee Portal, streamlining the reimbursement process.",
    "how do i book annual leave": "All employees can book and manage annual leave directly through the Employee Portal, providing a convenient way to schedule time off.",
    "where can i find job postings": "Job postings are available on the Employee Portal, allowing employees to explore internal career opportunities within FDM.",
    "how do i provide feedback on projects": "Employees can rate and provide reviews for projects they've completed through the Employee Portal, offering valuable feedback for continuous improvement.",
    "how do i access e-learning resources": "Trainers provide e-learning resources for employees to improve their skills through the Employee Portal, enabling continuous learning and development.",
    "what features does the employee portal offer": "The Employee Portal offers features such as direct messaging, video conferencing, project feedback, skills assessment, and career path planning, among others.",
    "how do i contact client support": "If you encounter any technical issues or require assistance, you can contact the IT helpdesk through the Employee Portal for quick resolution of common issues.",
    "what is the role of trainers in the employee portal": "Trainers play a crucial role in assigning training tasks, providing feedback, conducting online sessions, and tracking employee progress through the Employee Portal.",
    "how do i track my career progress": "You can track your career progress within FDM through the Employee Portal, which records training completion, performance reviews, goal achievements, and career milestones.",
    "what security measures are in place": "The Employee Portal ensures data security and privacy through role-based access control, HTTPS encryption, and regular updates to prevent security vulnerabilities.",
    "how do i participate in virtual meetings": "Employees can engage in virtual meetings and discussions through video conferencing features available on the Employee Portal, facilitating remote collaboration.",
    "how do i access the dynamic faq section": "The Employee Portal features a dynamic FAQ section that evolves based on common queries and AI learning, providing relevant information and assistance.",
    "how do i stay updated on internal updates": "Real-time notifications are provided to employees on internal updates and HR process changes through an internal newsfeed or notification system on the Employee Portal."
};



const inputInitHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    let chatContent;
    if (className === "outgoing") {
        chatContent = `<p>${message}</p>`;
    } else {
        chatContent = `
            <span class="material-symbols-outlined">
                <img src="assets/FDM_Group_Logo.png" alt="Logo" class="logo" width="40" height="40"> 
            </span>
        <p>${message}</p>`;
}

    chatLi.innerHTML = chatContent;
    return chatLi;
}

const generateResponse = () => {
    const userMessage = chatInput.value.trim().toLowerCase(); // Trim and convert to lowercase
    if (!userMessage) return;

    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(() => {
        // Ensure consistent matching by trimming and converting keys to lowercase
        const response = faqs[userMessage.trim()] || "I'm sorry, I don't understand. Please try asking another question.";
        const incomingChatLi = createChatLi(response, "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
    }, 600);
}


chatInput.addEventListener("input", () => {
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        generateResponse();
    }
});

sendChatBtn.addEventListener("click", generateResponse);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
