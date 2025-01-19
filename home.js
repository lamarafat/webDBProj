<<<<<<< HEAD
function applyNow(projectId) {
  document.getElementById('projectId').value = projectId;

  var applyModal = new bootstrap.Modal(document.getElementById('applyModal'));
  applyModal.show();
}
function applyNow(projectId) {
  document.getElementById('projectId').value = projectId;

  var applyModal = new bootstrap.Modal(document.getElementById('applyModal'));
  applyModal.show();
}

document.addEventListener('DOMContentLoaded', function () {
  const projectCards = document.querySelectorAll('.card-project');
  projectCards.forEach(function (card) {
      const viewDetailsLink = card.querySelector('.view-details');

      viewDetailsLink.addEventListener('click', function (event) {
          const projectId = card.getAttribute('data-id');
          const projectName = card.getAttribute('data-name');
          const projectDescription = card.getAttribute('data-description');
          const projectStatus = card.getAttribute('data-status');
          const projectDate = card.getAttribute('data-date');

          const projectData = {
              id: projectId,
              name: projectName,
              description: projectDescription,
              status: projectStatus,
              date: projectDate
          };
          localStorage.setItem('projectData', JSON.stringify(projectData));
          window.location.href = './project.php'; 
      });
  });
});






=======
function applyNow(projectId) {
  document.getElementById('projectId').value = projectId;

  var applyModal = new bootstrap.Modal(document.getElementById('applyModal'));
  applyModal.show();
}
function applyNow(projectId) {
  document.getElementById('projectId').value = projectId;

  var applyModal = new bootstrap.Modal(document.getElementById('applyModal'));
  applyModal.show();
}

document.addEventListener('DOMContentLoaded', function () {
  const projectCards = document.querySelectorAll('.card-project');
  projectCards.forEach(function (card) {
      const viewDetailsLink = card.querySelector('.view-details');

      viewDetailsLink.addEventListener('click', function (event) {
          const projectId = card.getAttribute('data-id');
          const projectName = card.getAttribute('data-name');
          const projectDescription = card.getAttribute('data-description');
          const projectStatus = card.getAttribute('data-status');
          const projectDate = card.getAttribute('data-date');

          const projectData = {
              id: projectId,
              name: projectName,
              description: projectDescription,
              status: projectStatus,
              date: projectDate
          };
          localStorage.setItem('projectData', JSON.stringify(projectData));
          window.location.href = './project.php'; 
      });
  });
});



>>>>>>> d0920f0714346dce224fec72d78c39a6fde8db59
