const allSideMenu = document.querySelectorAll('#sidebar .side-menu li a');
const urlParams = new URLSearchParams(window.location.search);
const menuId = urlParams.get('menu') || localStorage.getItem('menuClass');

allSideMenu.forEach(item => {
  const li = item.parentElement;

  if (li.id === menuId) {
    li.classList.add('active');
  }

  item.addEventListener('click', function () {
    allSideMenu.forEach(i => {
      i.parentElement.classList.remove('active');
    })
    li.classList.add('active');
    localStorage.setItem('menuClass', li.id);
  })
});




// TOGGLE SIDEBAR

const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');
const isSidebarHidden = localStorage.getItem('isSidebarHidden') === 'true';

if (isSidebarHidden) {
  sidebar.classList.add('hide');
}

menuBar.addEventListener('click', function () {
  sidebar.classList.toggle('hide');
  localStorage.setItem('isSidebarHidden', sidebar.classList.contains('hide'));
});




const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})




const switchMode = document.getElementById('switch-mode');
const darkModeKey = 'darkMode';

// Kiểm tra trạng thái đen tối được lưu trữ trong localStorage
const isDarkMode = localStorage.getItem(darkModeKey) === 'true';

// Áp dụng chế độ sáng/tối
if (isDarkMode) {
    document.body.classList.add('dark');
    switchMode.checked = true;
}

switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        localStorage.setItem(darkModeKey, 'true');
    } else {
        document.body.classList.remove('dark');
        localStorage.setItem(darkModeKey, 'false');
    }
})

import './fancyapp.js';

import './input-require';



