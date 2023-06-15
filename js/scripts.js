function confirmDelete() {
    return confirm('Are you sure you want to delete this?');
}

function comparePasswords() {
    const pw1 = document.getElementById('password').value;
    const pw2 = document.getElementById('confirm').value;
    const pwMsg = document.getElementById('pwMsg');

    if (pw1 != pw2) {
        pwMsg.innerText = 'Passwords do not match';
        return false; // this prevents the form submission
    }
    else {
        pwMsg.innerText = '';
        return true;
    }
}



function showHide() {
    const pw = document.getElementById('password');
    const img = document.getElementById('imgShowHide');

    if (pw.type == 'password') {
        pw.type = 'text';
        img.src = 'image/openeye.png';
    }
    else {
        pw.type = 'password';
        img.src = 'image/hideeye.png';
    }
}


// works page category


const categoryTitle = document.querySelectorAll('.category-title');
const allCategoryPosts = document.querySelectorAll('.all');

for(let i = 0; i < categoryTitle.length; i++){
    categoryTitle[i].addEventListener('click', filterPosts.bind(this, categoryTitle[i]));
}

function filterPosts(item){
    changeActivePosition(item);
    for(let i = 0; i < allCategoryPosts.length; i++){
        if(allCategoryPosts[i].classList.contains(item.attributes.id.value)){
            allCategoryPosts[i].style.display = "block";
        } else {
            allCategoryPosts[i].style.display = "none";
        }
    }
}

function changeActivePosition(activeItem){
    for(let i = 0; i < categoryTitle.length; i++){
        categoryTitle[i].classList.remove('active');
    }
    activeItem.classList.add('active');
};
