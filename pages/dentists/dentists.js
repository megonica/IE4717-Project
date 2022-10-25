const select = document.querySelector('select');

select.addEventListener('change', (e) => {
  const { value } = e.target;
  if (value !== '')
    location.href = `./dentists.php?treatment=${encodeURIComponent(value)}`;
  else location.href = `./dentists.php`;
});
