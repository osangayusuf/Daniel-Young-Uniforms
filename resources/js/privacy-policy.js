const showPrivacy = document.querySelector('#show-privacy');
const closePrivacy = document.querySelector('#close-privacy');
const privacyPolicy = document.querySelector('#privacy')

const togglePrivacy = () => {
    privacyPolicy.classList.toggle('hidden');
    privacyPolicy.classList.toggle('block');
}

showPrivacy.addEventListener('click', togglePrivacy);
closePrivacy.addEventListener('click', togglePrivacy);

