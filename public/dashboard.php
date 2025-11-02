<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <meta name="robots" content="noindex, nofollow">
  <link rel="shortcut icon" href="data:image/x-icon;,">
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="title">Admin Dashboard</div>
      <div class="tabs">
        <button class="tab active" data-tab="projects">Projects</button>
        <button class="tab" data-tab="customers">Customers</button>
      </div>
    </div>

    <!-- Projects Panel -->
    <section data-panel="projects">
      <div class="grid">

        <!-- Add Project -->
        <div class="card">
          <h2>Add Project</h2>
          <form action="add_project.php" method="POST" enctype="multipart/form-data" id="projectForm">
            <div class="row">
              <div>
                <label for="projHeading">Heading</label>
                <input id="projHeading" name="heading" type="text" required>
              </div>
              <div>
                <label for="projName">Project Name</label>
                <input id="projName" name="name" type="text" required>
              </div>
            </div>

            <div class="row">
              <div>
                <label for="projImage">Project Image</label>
                <input id="projImage" name="image" type="file" accept="image/*">
              </div>
              <div>
                <label>Preview</label>
                <div class="row" style="grid-template-columns: 96px 1fr; align-items:center;">
                  <img id="projPreview" class="thumb" alt="preview">
                </div>
              </div>
            </div>

            <div>
              <label for="projDesc">Description</label>
              <textarea id="projDesc" name="description" required></textarea>
            </div>

            <div class="actions">
              <button type="submit" class="btn primary">Save Project</button>
              <button type="reset" id="resetProject" class="btn muted">Reset</button>
            </div>
          </form>
        </div>

        <!-- Project List -->
        <div class="card">
          <h2>Projects</h2>
          <div class="toolbar">
            <input id="importProjectsFile" class="sr" type="file" accept="application/json">
            <button id="exportProjects" class="btn success">Export JSON</button>
            <button id="importProjects" class="btn muted">Import JSON</button>
            <button id="clearProjects" class="btn danger">Clear All</button>
          </div>
          <div id="projectsList" class="list"></div>
        </div>

      </div>
    </section>

    <!-- Customers Panel -->
    <section data-panel="customers" style="display:none;">
      <div class="grid">
        <div class="card">
          <h2>Customer Messages</h2>
          <div class="toolbar">
            <button id="exportCustomers" class="btn success">Export CSV</button>
            <button id="clearCustomers" class="btn danger">Clear All</button>
          </div>
          <div id="customersList" class="list"></div>
        </div>
      </div>
    </section>
  </div>

<script>
/* ===== Helpers ===== */
const $  = q => document.querySelector(q);
const $$ = q => [...document.querySelectorAll(q)];

/* ===== Tabs ===== */
$$('.tab').forEach(t =>
  t.addEventListener('click', () => {
    $$('.tab').forEach(x => x.classList.remove('active'));
    t.classList.add('active');
    const tab = t.dataset.tab;
    $$('section[data-panel]').forEach(p =>
      p.style.display = p.dataset.panel === tab ? 'block' : 'none'
    );
  })
);

/* ===== Customer Store (localStorage) ===== */
const store = {
  get(k, d) { try { return JSON.parse(localStorage.getItem(k)) ?? d } catch { return d } },
  set(k, v) { localStorage.setItem(k, JSON.stringify(v)) }
};

function renderCustomers(){
  const list = $('#customersList');
  const items = store.get('customers', []);
  list.innerHTML = items.length ? '' : `<div class="empty">No messages yet</div>`;

  items.forEach(c => {
    const el = document.createElement('div');
    el.className = 'item';
    el.innerHTML = `
      <div class="meta"><strong>${c.name}</strong> (${c.email})<br>${c.message}</div>
      <button class="btn danger" data-id="${c.id}">Delete</button>
    `;
    el.querySelector('button').onclick = () => {
      store.set('customers', items.filter(x => x.id !== c.id));
      renderCustomers();
    };
    list.appendChild(el);
  });
}
renderCustomers();

/* ===== Project Image Preview ===== */
$('#projImage').onchange = e => {
  const f = e.target.files?.[0];
  if(!f) return $('#projPreview').src = '';
  const r = new FileReader();
  r.onload = () => $('#projPreview').src = r.result;
  r.readAsDataURL(f);
};

/* ===== Load Projects from DB ===== */
async function loadProjects() {
  try {
    const res = await fetch("get_projects.php"); 
    const result = await res.json();
    const data = result.data;  // ✅ fix

    const list = document.querySelector('#projectsList');

    if (!data || data.length === 0) {
      list.innerHTML = `<div class="empty">No projects yet</div>`;
      return;
    }

    list.innerHTML = '';
    data.forEach(p => {
      const el = document.createElement('div');
      el.className = 'item';
      el.innerHTML = `
        <img src="${p.image || ''}" class="thumb">
        <div class="meta"><strong>${p.heading}</strong> — ${p.name}<br>${p.description}</div>
        <button class="btn danger" data-id="${p.id}">Delete</button>
      `;

      el.querySelector('button').onclick = async () => {
        if(!confirm("Delete this project?")) return;
        await fetch("delete_project.php?id=" + p.id);
        loadProjects();
      };

      list.appendChild(el);
    });

  } catch (e) {
    document.querySelector('#projectsList').innerHTML = `<div class="empty">Failed to load projects</div>`;
    console.log(e);
  }
}


/* ===== Export ===== */
$('#exportProjects').onclick = async () => {
  const res = await fetch("get_projects.php");
  const data = await res.json();
  const blob = new Blob([JSON.stringify(data,null,2)], {type:"application/json"});
  const a = document.createElement("a");
  a.href = URL.createObjectURL(blob);
  a.download = "projects_backup.json";
  a.click();
};

/* ===== Import ===== */
$('#importProjects').onclick = () => $('#importProjectsFile').click();
$('#importProjectsFile').onchange = async e => {
  const file = e.target.files[0];
  if(!file) return;
  const json = JSON.parse(await file.text());
  await fetch("import_projects.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify(json)});
  alert("Imported!");
  loadProjects();
};

/* ===== Clear All ===== */
document.addEventListener("DOMContentLoaded", () => {

  document.getElementById("clearProjects").addEventListener("click", async () => {
    if (!confirm("Are you sure you want to delete ALL projects?")) return;

    const res = await fetch("clear_projects.php", { method: "POST" });
    const data = await res.json();

    if (data.status === "success") {
      alert("All projects cleared!");
      loadProjects();
    } else {
      alert("Error clearing projects");
    }
  });

  loadProjects();
});

</script>
</body>
</html>
