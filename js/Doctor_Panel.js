const clientTabItems = document.querySelectorAll('.Doctor-item');
const showDiv = document.querySelector('.show-info');

clientTabItems.forEach((item) => {
    item.addEventListener('click', () => {
        showInfo(item);
    });
});

function showInfo(item){
    showDiv.querySelector('.show-img img').src = item.querySelector('.Doctor-thumbnail img').src;
    showDiv.querySelector('.show-name').innerHTML = item.querySelector('.Doctor-name').innerHTML;
    showDiv.querySelector('.show-designation').innerHTML = item.querySelector('.Doctor-designation').innerHTML;
    showDiv.querySelector('.show-description').innerHTML = item.querySelector('.Doctor-description').innerHTML;
    setActiveTab(item);
}

function setActiveTab(item){
    clientTabItems.forEach((item) => {
        item.classList.remove('active'); // resetting active tab
    });
    item.classList.add('active');
}

showInfo(clientTabItems[0]); // default active tab