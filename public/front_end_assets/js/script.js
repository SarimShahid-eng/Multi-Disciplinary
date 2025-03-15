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

// navigation bar 

//mobile manu 
const mobileMenuIcon = document.querySelector('.mobile-menu-icon');
const sidebarMenu = document.querySelector('.sidebar-menu');
const closeBtn = document.querySelector('.close-btn');

// Show Sidebar
mobileMenuIcon.addEventListener('click', () => {
    sidebarMenu.style.left = '0';
});

// Hide Sidebar
closeBtn.addEventListener('click', () => {
    sidebarMenu.style.left = '-250px';
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


// Select all buttons
const buttons = document.querySelectorAll('.filter-btn');

// Add click event listener
buttons.forEach(button => {
    button.addEventListener('click', function () {
        // Remove 'active' class from all buttons
        buttons.forEach(btn => btn.classList.remove('active'));

        // Add 'active' class to the clicked button
        this.classList.add('active');
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const dropdownArrow = document.querySelector(".dropdown-arrow");
    const dropdownMenu = document.querySelector(".dropdown-menu");
    const userProfile = document.querySelector(".user-profile");

    dropdownArrow.addEventListener("click", function () {
        dropdownMenu.style.display = "block";
    });

    document.addEventListener("click", function (event) {
        if (!userProfile.contains(event.target)) {
            dropdownMenu.style.display = "none"; // Hide dropdown
        }
    });
});

login.addEventListener('click', () => {
    window.location.href = "login.php";
});