// Character count for scope statement
const scopeStatement = document.getElementById('scope-statement');
const charCount = document.getElementById('char-count');

const sectionOne = document.getElementById('section-one'),
    sectionTwo = document.getElementById('section-two'),
    sectionThree = document.getElementById('section-three'),
    sectionFour = document.getElementById('section-four'),
    sectionFive = document.getElementById('section-five');

document.addEventListener('DOMContentLoaded', () => {
    // Dynamic character counters
    const updateCounter = (input, counter, max) => {
        const remaining = max - input.value.length;
        counter.textContent = `${remaining} characters left`;
    };

    const titleInput = document.getElementById('article-title');
    const titleCounter = document.getElementById('title-counter');
    titleInput.addEventListener('input', () => updateCounter(titleInput, titleCounter, 500));

    const runningInput = document.getElementById('running-title');
    const runningCounter = document.getElementById('running-counter');
    runningInput.addEventListener('input', () => updateCounter(runningInput, runningCounter, 100));

    const abstractInput = document.getElementById('abstract');
    const abstractCounter = document.getElementById('abstract-counter');
    abstractInput.addEventListener('input', () => {
        const words = abstractInput.value.split(/\s+/).filter(word => word.length > 0);
        const remaining = 250 - words.length;
        abstractCounter.textContent = `${remaining} words left`;
    });

    const bodyInput = document.getElementById('body-text');
    const bodyCounter = document.getElementById('body-counter');
    bodyInput.addEventListener('input', () => {
        const words = bodyInput.value.split(/\s+/).filter(word => word.length > 0);
        const remaining = 3000 - words.length;
        bodyCounter.textContent = `${remaining} words left`;
    });

    // Keyword management
    const keywordInput = document.querySelector('.keyword-input');
    const addKeywordButton = document.getElementById('add-keyword');
    const keywordList = document.getElementById('keyword-list');
    const keywordError = document.getElementById('keyword-error');

    const keywords = [];

    const updateKeywords = () => {
        keywordList.innerHTML = '';
        keywords.forEach((keyword, index) => {
            const keywordElement = document.createElement('div');
            keywordElement.classList.add('keyword');
            keywordElement.textContent = keyword;

            const removeButton = document.createElement('button');
            removeButton.textContent = '×';
            removeButton.addEventListener('click', () => {
                keywords.splice(index, 1);
                updateKeywords();
            });

            keywordElement.appendChild(removeButton);
            keywordList.appendChild(keywordElement);
        });

        if (keywords.length < 5 || keywords.length > 8) {
            keywordError.textContent = 'Please enter between 5 and 8 keywords.';
        } else {
            keywordError.textContent = '';
        }
    };

    addKeywordButton.addEventListener('click', () => {
        const keyword = keywordInput.value.trim();
        if (keyword && !keywords.includes(keyword) && keywords.length < 8) {
            keywords.push(keyword);
            updateKeywords();
        }
        keywordInput.value = '';
    });

    // Form submission
    const form = document.getElementById('submission-form');
    form.addEventListener('submit', (event) => {
        if (keywords.length < 5 || keywords.length > 8) {
            event.preventDefault();
            keywordError.textContent = 'Please enter between 5 and 8 keywords before submitting.';
        }
    });
});

scopeStatement.addEventListener('input', () => {
    const remaining = 200 - scopeStatement.value.length;
    charCount.textContent = `${remaining} characters left`;
});

// Drag and drop functionality
document.querySelectorAll('.file-upload').forEach(upload => {
    const input = upload.querySelector('input');

    upload.addEventListener('dragover', (e) => {
        e.preventDefault();
        upload.classList.add('border-primary');
    });

    upload.addEventListener('dragleave', () => {
        upload.classList.remove('border-primary');
    });

    upload.addEventListener('drop', (e) => {
        e.preventDefault();
        upload.classList.remove('border-primary');
        input.files = e.dataTransfer.files;
        alert(`${input.files[0].name} uploaded successfully!`);
    });

    upload.addEventListener('click', () => input.click());
});

// Function to show the next section
function showNextSection(currentSection, nextSection) {
    document.getElementById(currentSection).classList.add('hidden');  // Hide the current section
    document.getElementById(nextSection).classList.remove('hidden');  // Show the next section
}

// When "Save & Continue" is clicked in Section One
document.getElementById('save-continue-btn-section-one').addEventListener('click', () => {
    showNextSection('section-one', 'section-two');  // Show Section Two after Section One
});

// When "Save & Continue" is clicked in Section Two (optional for your case)
document.getElementById('save-continue-btn-section-two').addEventListener('click', () => {
    showNextSection('section-two', 'section-three');  // Show Section Three after Section Two
});

// When "Save & Continue" is clicked in Section Three (optional for your case)
document.getElementById('save-continue-btn-section-three').addEventListener('click', () => {
    showNextSection('section-three', 'section-four');  // Show Section Four after Section Three
});

// When "Save & Continue" is clicked in Section Four (optional for your case)
document.getElementById('save-continue-btn-section-four').addEventListener('click', () => {
    showNextSection('section-four', 'section-five');  // Show Section Four after Section Three
});



// Previous Buttons
const previousBtnTwo = document.getElementById("previous-btn-section-two");
const previousBtnThree = document.getElementById("previous-btn-section-three");
const previousBtnFour = document.getElementById("previous-btn-section-four");
const previousBtnFive = document.getElementById("previous-btn-section-five");



previousBtnTwo.addEventListener("click", () => {
    sectionTwo.classList.add("hidden");
    sectionOne.classList.remove("hidden");
});

previousBtnThree.addEventListener("click", () => {
    sectionThree.classList.add("hidden");
    sectionTwo.classList.remove("hidden");
});

previousBtnFour.addEventListener("click", () => {
    sectionFour.classList.add("hidden");
    sectionThree.classList.remove("hidden");
});

previousBtnFive.addEventListener("click", () => {
    sectionFive.classList.add("hidden");
    sectionFour.classList.remove("hidden");
});



const fundingSelect = document.getElementById('funding');
const funderWarning = document.getElementById('funder-warning');

fundingSelect.addEventListener('change', () => {
    if (fundingSelect.value.includes('Funding was received')) {
        funderWarning.classList.remove('d-none');
    } else {
        funderWarning.classList.add('d-none');
    }
});
