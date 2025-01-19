document.addEventListener('DOMContentLoaded', function() {
    const projectData = JSON.parse(localStorage.getItem('projectData'));
    
    console.log('Project Data from localStorage:', projectData);
    
    if (projectData) {
        document.getElementById('projName').textContent = projectData.name;
        document.getElementById('projDesc').textContent = projectData.description;
        document.getElementById('projStatus').textContent = `Status: ${projectData.status}`;
        document.getElementById('projDate').textContent = `Created on: ${projectData.date}`;
    } else {
        console.error('No project data found in localStorage');
    }
});
function applyNow() {
    const projectData = JSON.parse(localStorage.getItem('projectData'));
    if (projectData) {
        document.getElementById('projectId').value = projectData.id;
        const modalTitle = document.querySelector('#applyModal .modal-title');
        modalTitle.textContent = `Apply for ${projectData.name}`; 
        var applyModal = new bootstrap.Modal(document.getElementById('applyModal'));
        applyModal.show();
    } else {
        console.error('No project data found in localStorage');
    }
}


function submitProposal() {
    const proposalText = document.getElementById('proposalText').value;
    const proposalFile = document.getElementById('proposalFile').files[0];
    const projectId = document.getElementById('projectId').value;
    const freelancerId = document.getElementById('freelancerId').value;
    
    if (!proposalText || !proposalFile) {
        alert("Please fill in the proposal text and upload a CV.");
        return;
    }
    let formData = new FormData();
    formData.append('proposalText', proposalText);
    formData.append('proposalFile', proposalFile);
    formData.append('projectId', projectId);
    formData.append('freelancerId', freelancerId);

    fetch('/submit-proposal', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        var applyModal = new bootstrap.Modal(document.getElementById('applyModal'));
        applyModal.hide();
        alert("Your proposal has been submitted successfully!");
    })
    .catch(error => {
        console.error('Error:', error);
        alert("There was an error submitting your proposal.");
    });
}
