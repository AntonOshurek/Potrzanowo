const mobileMenu = () => {
	const mobileButton = document.querySelector('.nav-button');
	const mobileBtnIcon = document.querySelector('.nav-button__burger');
	const navigation = document.querySelector('.nav');
	const body = document.querySelector('.body');

	const MENU_STATUSES = {
		OPEN: 'open',
		CLOSE: 'close',
	};

	let menuStatus = MENU_STATUSES.CLOSE;

	const menuSwitcher = () => {
		switch (menuStatus) {
			case MENU_STATUSES.OPEN:
				closeMobileMenu();
				break;
			case MENU_STATUSES.CLOSE:
				openMobileMenu();
				break;
		}
	};

	const onEscKeydown = (evt) => {
		if (evt.key === 'Escape') {
			evt.preventDefault();
			closeMobileMenu();
		}
	};

	const onBackgroundClick = (evt) => {
		if (evt.target.parentElement.tagName === 'HTML') {
			closeMobileMenu();
		}
	};

	function openMobileMenu() {
		navigation.classList.add('nav--open');
		body.classList.add('body--nav-open');
		mobileBtnIcon.classList.add('nav-button__burger--active');
		menuStatus = MENU_STATUSES.OPEN;

		body.addEventListener('click', onBackgroundClick);
		document.addEventListener('keydown', onEscKeydown);
	}

	function closeMobileMenu() {
		navigation.classList.remove('nav--open');
		body.classList.remove('body--nav-open');
		mobileBtnIcon.classList.remove('nav-button__burger--active');
		menuStatus = MENU_STATUSES.CLOSE;

		body.removeEventListener('click', onBackgroundClick);
		document.removeEventListener('keydown', onEscKeydown);
	}

	mobileButton.addEventListener('click', menuSwitcher);
};

window.addEventListener('DOMContentLoaded', () => {
	mobileMenu();
});
