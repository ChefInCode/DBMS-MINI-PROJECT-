function fetchStaffData() {
    fetch('staff_data.php')
      .then(response => response.json())
      .then(data => {
        const tableBody = document.querySelector('table tbody');
        data.forEach(staff => {
          const row = document.createElement('tr');
          const staff_nameCell = document.createElement('td');
          const designationCell = document.createElement('td');
    
          staff_nameCell.textContent = staff.staff_name;
          designationCell.textContent = staff.designation;
         
          row.appendChild(staff_nameCell);
          row.appendChild(designationCell);
          
          tableBody.appendChild(row);
        });
      });
  }
  
  fetchStaffData();
  