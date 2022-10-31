const currentDate = document.querySelector('.current-date'),
  daysTag = document.querySelector('.days'),
  prevNextIcon = document.querySelectorAll('.icons span');

// getting new date, current year and month
let date = new Date(),
  currYear = date.getFullYear(),
  currMonth = date.getMonth();

const months = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
];

const renderCalendar = () => {
  let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of prev month
  let liTag = '';

  for (let i = firstDayofMonth; i > 0; i--) {
    // creating button of prev month last days
    liTag += `<input type="button" class="inactive" value="${
      lastDateofLastMonth - i + 1
    }" disabled>`;
  }

  for (let i = 1; i <= lastDateofMonth; i++) {
    // creating button of all days of current month
    // adding active class to button if the current day, month, and year matched
    let date = currYear + '-' + (currMonth + 1) + '-' + i;
    let isActive = sessionStorage.getItem(date) !== null ? 'active' : '';
    if (isActive === '')
      liTag += `<input type="button" class="" value="${i}" disabled>`;
    else if (isActive === 'active') {
      liTag += `<input type="button" class="active" value="${i}" onclick="getDay()">`;
    }
  }

  for (let i = lastDayofMonth; i < 6; i++) {
    // creating button of next month first days
    liTag += `<input type="button" class="inactive" value="${
      i - lastDayofMonth + 1
    }" disabled>`;
  }

  currentDate.innerText = `${months[currMonth]} ${currYear}`;
  daysTag.innerHTML = liTag;
};
renderCalendar();

prevNextIcon.forEach((icon) => {
  icon.addEventListener('click', () => {
    // adding click event on both icons
    // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
    currMonth = icon.id === 'prev' ? currMonth - 1 : currMonth + 1;

    if (currMonth < 0 || currMonth > 11) {
      // if current month is less than 0 or greater than li
      // creating a new date of current year & month and pass it as date value
      date = new Date(currYear, currMonth);
      currYear = date.getFullYear(); // updating current year with new date year
      currMonth = date.getMonth(); // updating current month with new date month
    } else {
      // else pass new Date as date value
      date = new Date();
    }
    renderCalendar();
  });
});

// document
//   .querySelector('input[value="30"][class=""]')
//   .setAttribute('class', 'active');
