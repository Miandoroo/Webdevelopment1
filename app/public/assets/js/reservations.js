const reservationButtons = document.querySelectorAll('[data-book-class]');

reservationButtons.forEach((button) => {
  button.addEventListener('click', async () => {
    const classId = button.dataset.bookClass;
    const response = await fetch('/api/reservations', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ class_id: classId })
    });

    const payload = await response.json();
    button.closest('.card')?.querySelector('[data-booking-status]')?.replaceChildren(
      document.createTextNode(payload.message)
    );
  });
});
