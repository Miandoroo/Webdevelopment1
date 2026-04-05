const filterForm = document.querySelector('[data-schedule-filters]');
const scheduleTarget = document.querySelector('[data-schedule-results]');

if (filterForm && scheduleTarget) {
  filterForm.addEventListener('change', async () => {
    const params = new URLSearchParams(new FormData(filterForm));
    const response = await fetch(`/api/classes?${params.toString()}`);
    const payload = await response.json();

    scheduleTarget.innerHTML = payload.data
      .map((item) => `
        <div class="col-md-6">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h3 class="h5">${item.title}</h3>
              <p class="mb-1">${item.class_date} ${item.start_time}</p>
              <p class="mb-1">Level: ${item.level}</p>
              <p class="mb-0">Trainer: ${item.trainer_name ?? 'TBA'}</p>
            </div>
          </div>
        </div>
      `)
      .join('');
  });
}
