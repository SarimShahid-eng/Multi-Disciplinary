
document.querySelector('.hamburger').addEventListener('click', function () {
    document.querySelector('.nav-links').classList.toggle('active');
});
// dropdown 
document.querySelectorAll('.dropdown > a').forEach(item => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        let parent = this.parentElement;
        document.querySelectorAll('.dropdown').forEach(drop => {
            if (drop !== parent) {
                drop.classList.remove('active');
            }
        });
        parent.classList.toggle('active');
    });
});

/* Close dropdown when clicking outside */
document.addEventListener('click', function (event) {
    let dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove('active');
        }
    });
});

// slidder 
let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');

function showSlide(index) {
    currentIndex = index;
    document.querySelector('.slider').style.transform = `translateX(-${index * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
}

function currentSlide(index) {
    showSlide(index);
}

function autoSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
}

setInterval(autoSlide, 5000);

// type of user 
// Select all buttons
const buttons = document.querySelectorAll('.filter-btn');

var login = document.getElementById('login');
// JavaScript code to toggle the background color on scroll
document.addEventListener('scroll', function () {
    const header = document.querySelector('.header-main');
    const heroSection = document.querySelector('.hero-section');

    if (window.scrollY > heroSection.offsetHeight) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

$(document).ready(function () {
    // Shuru mein sirf authors wale items dikhayen
    $('.user-type-item').each(function () {
        if ($(this).data('category') === 'author') {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});


// Filter button ka click event
$('.filter-btn').click(function () {
    var filter = $(this).data('filter');

    if (filter === 'all') {
        $('.user-type-item').show();
    } else {
        $('.user-type-item').each(function () {
            var categories = $(this).data('category').split(' '); // Split categories
            if (categories.includes(filter)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Select all tabs and article sections
    const tabs = document.querySelectorAll(".tab-link");
    const articles = document.querySelectorAll(".article-cards");
    const mobileTabs = document.querySelector(".mobile-tabs"); // Mobile select dropdown

    // Event listener for the tabs
    tabs.forEach(tab => {
        tab.addEventListener("click", function (event) {
            event.preventDefault();

            // Remove 'active' class from all tabs
            tabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");

            // Hide all article sections
            articles.forEach(article => article.classList.add("hidden"));

            // Show the selected article section based on the tab clicked
            const targetId = this.getAttribute("data-tab");
            const targetSection = document.getElementById(targetId);
            targetSection.classList.remove("hidden");
        });
    });

    // Event listener for the mobile dropdown
    mobileTabs.addEventListener("change", function () {
        const selectedTab = this.value; // Get selected value from the dropdown

        // Remove 'active' class from all tabs in the dropdown
        tabs.forEach(t => t.classList.remove("active"));

        // Find the matching tab and add the 'active' class
        const activeTab = document.querySelector(`.tab-link[data-tab="${selectedTab}"]`);
        if (activeTab) activeTab.classList.add("active");

        // Hide all article sections first
        articles.forEach(article => article.classList.add("hidden"));

        // Show the selected article section based on the dropdown value
        const targetSection = document.getElementById(selectedTab);
        if (targetSection) targetSection.classList.remove("hidden");
    });
});


// Add click event listener
buttons.forEach(button => {
    button.addEventListener('click', function () {
        // Remove 'active' class from all buttons
        buttons.forEach(btn => btn.classList.remove('active'));

        // Add 'active' class to the clicked button
        this.classList.add('active');
    });
});



login.addEventListener('click', () => {
    window.location.href = "login.php";
});

