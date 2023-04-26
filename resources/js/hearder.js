
    const menuItems = document.querySelectorAll('.menu__item');

    // Lấy class được lưu trong local storage
    const savedActiveItem = localStorage.getItem('activeMenuItem');

    // Nếu class đã được lưu, thêm class đó vào menuItem tương ứng
    if (savedActiveItem) {
    const activeItem = document.querySelector(`.${savedActiveItem}`);
    activeItem.classList.add('active__menu__item');
        }

    // Lặp qua từng menuItem
    menuItems.forEach(item => {
    // Xử lý sự kiện click cho menuItem
    item.addEventListener('click', e => {
        e.preventDefault();

        // Lấy class hiện tại của menuItem
        const currentClass = item.getAttribute('class');

        // Nếu menuItem không có class active, xoá class active khỏi các menuItem khác và thêm class active vào menuItem hiện tại
        if (!currentClass.includes('active')) {
        menuItems.forEach(menuItem => {
            menuItem.classList.remove('active__menu__item');
    });
        item.classList.add('active__menu__item');

        // Lưu class active vào local storage
        localStorage.setItem('activeMenuItem', 'active__menu__item');
        }
    });
    });




    // Lấy tất cả các submenu
    let subMenus = document.querySelectorAll('.menu-sub > li');

    // Duyệt qua từng submenu và thêm sự kiện hover
    subMenus.forEach((subMenu) => {
      let subMenuPage = subMenu.querySelector('.menu_sub_page');

      // Kiểm tra xem submenu có phải là menu con cuối cùng hay không
      if (subMenuPage) {
        subMenu.addEventListener('mouseenter', () => {
          // Hiển thị submenu page
          subMenuPage.style.display = 'block';

          // Kiểm tra nếu submenu page tràn ra màn hình bên phải thì đưa sang bên trái
          if (subMenuPage.getBoundingClientRect().right > window.innerWidth) {
            subMenuPage.style.left = `-${332}px`;
          }
        });

        subMenu.addEventListener('mouseleave', () => {
          // Ẩn submenu page
          subMenuPage.style.display = 'none';
        });
      }


    });



    const searchBtn = document.querySelector('.search__index');
    const searchInput = document.querySelector('.search__input');

    // Show input when search button is clicked
    searchBtn.addEventListener('click', () => {
        searchInput.style.display = 'block';
    });

    // Hide input when clicking outside of it
    document.addEventListener('click', (event) => {
        const isClickInside = searchInput.contains(event.target) || searchBtn.contains(event.target);
        if (!isClickInside) {
        searchInput.style.display = 'none';
        }
    });





    const logoImg = document.querySelector('.logo__img');

    window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    const winHeight = window.innerHeight
    const scrollTop = window.innerHeight + 20

    if (scrolled > scrollTop) {
        logoImg.style.width = '70px';
        logoImg.style.height = 'auto';
    }
    });

