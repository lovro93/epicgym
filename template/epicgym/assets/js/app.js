/*
* Epicgym main scripts
* Author: Lovro Pavicic
* */

// Mobile menu
// Define buttons elements
let btnOpenMenu = document.getElementById('mobile-menu');
let btnCloseMenu = document.getElementById('mobile-menu-close');
// Define navigation element
let mobileMenu = document.getElementById('top-nav');

// Open mobile menu
btnOpenMenu.addEventListener('click', function (e){
    // Prevent default browser action
    e.preventDefault()
    // Show navigation and close menu button
    mobileMenu.style.display = 'block'
    btnCloseMenu.style.display = 'block'
    // Hide open menu button
    btnOpenMenu.style.display = 'none'
    console.log('Menu opened!')
})

// Close mobile menu
btnCloseMenu.addEventListener('click', function(e){
    // Prevent default browser action
    e.preventDefault()
    // Hide navigation and close menu button
    mobileMenu.style.display = 'none'
    btnCloseMenu.style.display = 'none'
    // Show open menu button
    btnOpenMenu.style.display = 'block'
    console.log('Menu closed!')
})

// Vanilla Slider JS
const firstSlide = 0;

let items = [];
const slides = Array.from(document.getElementsByClassName('slide'));
const slidesNavigation = document.getElementById('dots');

const createListItem = (text) => {
    const li = document.createElement('li');
    li.id = text;
    li.className = 'dot';
    return li;
}

const appendChildren = (parent, children) => {
    children.forEach(function(child, index) {
        child.addEventListener('click', function() {
            toggleChildren(this, true);
            showSlides(index);
        });
        parent.appendChild(child);
    });
}

const removeActive = (items) => {
    items.forEach(child => child.classList.remove('active'));
}

const toggleChildren = (children, state) => {
    removeActive(items);
    state ? children.classList.add('active') : children.classList.remove('active');
};

const showSlides = (pos) => slides.forEach((slide, index) => {
    items.push(createListItem('slide-'+index));

    if(index === pos){
        slide.style.display = 'block';

        return;
    }
    slide.style.display = 'none';
})

showSlides(firstSlide);

appendChildren(slidesNavigation, items);