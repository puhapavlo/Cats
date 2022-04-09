const modalDeleteAll = document.querySelector('.form-delete-all');
const deleteAllBtn = document.querySelector('.cats-delete-all');
const cancelAllBtn = document.querySelector('.form-cancel-all');

deleteAllBtn.addEventListener('click', () => {
  modalDeleteAll.classList.add('active');
})

cancelAllBtn.addEventListener('click', (e) => {
  e.preventDefault();
  modalDeleteAll.classList.remove('active');
});
