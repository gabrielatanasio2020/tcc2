
const handleSubmit = () => {
  document.getElementById('formGuests').submit();
}



const resetVariables = () => {
  localStorage.setItem('forms', '');
  localStorage.setItem('currentForm', '');
  window.location.reload();
}