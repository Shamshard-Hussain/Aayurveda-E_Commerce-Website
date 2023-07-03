  document.getElementById('find').addEventListener('input', function() {
    search();
  });
 function search() {
  let filter = document.getElementById('find').value.toUpperCase();
  let teamMembers = document.querySelectorAll('.team_member');
  let noResult = document.querySelector('#no-result');

  let matchFound = false;

  teamMembers.forEach(teamMember => {
    let h3 = teamMember.querySelector('h3');
    let span = teamMember.querySelector('span');
    let p = teamMember.querySelector('p');
    let h3Value = h3.innerHTML || h3.innerText || h3.textContent;
    let spanValue = span.innerHTML || span.innerText || span.textContent;
    let pValue = p.innerHTML || p.innerText || p.textContent;
    let isMatch = (h3Value.toUpperCase().indexOf(filter) > -1) || 
                  (spanValue.toUpperCase().indexOf(filter) > -1) || 
                  (pValue.toUpperCase().indexOf(filter) > -1);
    if (isMatch) {
      teamMember.style.display = "";
      matchFound = true;
    } else {
      teamMember.style.display = "none";
    }
  });

  if (!matchFound) {
    noResult.style.display = "";
  } else {
    noResult.style.display = "none";
  }
}