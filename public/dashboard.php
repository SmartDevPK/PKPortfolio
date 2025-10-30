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

    <section data-panel="projects">
      <div class="grid">
        <div class="card">
          <h2>Add Project</h2>
          <div class="row">
            <div>
              <label for="projHeading">Heading</label>
              <input id="projHeading" type="text" placeholder="e.g. Featured Work">
            </div>
            <div>
              <label for="projName">Project Name</label>
              <input id="projName" type="text" placeholder="e.g. Portfolio Website">
            </div>
          </div>
          <div class="row">
            <div>
              <label for="projImage">Project Image</label>
              <input id="projImage" type="file" accept="image/*">
            </div>
            <div>
              <label for="projPreview">Preview</label>
              <div class="row" style="grid-template-columns: 96px 1fr; align-items:center;">
                <img id="projPreview" class="thumb" alt="preview">
                <span class="pill">Max ~1MB recommended</span>
              </div>
            </div>
          </div>
          <div>
            <label for="projDesc">Description</label>
            <textarea id="projDesc" placeholder="Write a short description..."></textarea>
          </div>
          <div class="actions">
            <button id="saveProject" class="btn primary">Save Project</button>
            <button id="resetProject" class="btn muted">Reset</button>
            <span class="pill">Ctrl/⌘ + Enter to save</span>
          </div>
        </div>
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
    const $ = (q) => document.querySelector(q);
    const $$ = (q) => Array.from(document.querySelectorAll(q));
    const store = {
      get(k, d) { try { return JSON.parse(localStorage.getItem(k)) ?? d; } catch { return d; } },
      set(k, v) { localStorage.setItem(k, JSON.stringify(v)); }
    };

    const tabs = $$('.tab');
    const panels = $$('section[data-panel]');
    tabs.forEach(t => t.addEventListener('click', () => {
      tabs.forEach(x => x.classList.remove('active'));
      t.classList.add('active');
      const name = t.getAttribute('data-tab');
      panels.forEach(p => p.style.display = p.getAttribute('data-panel') === name ? 'block' : 'none');
    }));

    const projHeading = $('#projHeading');
    const projName = $('#projName');
    const projImage = $('#projImage');
    const projPreview = $('#projPreview');
    const projDesc = $('#projDesc');
    const projectsList = $('#projectsList');

    const customersList = $('#customersList');

    let imageData = '';
    projImage.addEventListener('change', (e) => {
      const file = e.target.files && e.target.files[0];
      if (!file) { imageData = ''; projPreview.src = ''; return; }
      const reader = new FileReader();
      reader.onload = () => { imageData = reader.result; projPreview.src = imageData; };
      reader.readAsDataURL(file);
    });

    function renderProjects() {
      const items = store.get('projects', []);
      projectsList.innerHTML = '';
      if (!items.length) { projectsList.innerHTML = `<div class="empty">No projects yet</div>`; return; }
      items.forEach(p => {
        const el = document.createElement('div');
        el.className = 'item';
        el.innerHTML = `
          <img src="${p.image || ''}" alt="img" class="thumb">
          <div class="meta">
            <div class="name">${p.heading || ''} — ${p.name || ''}</div>
            <div class="sub">${p.description || ''}</div>
          </div>
          <div class="actions">
            <button class="btn danger" data-id="${p.id}">Delete</button>
          </div>
        `;
        el.querySelector('button').addEventListener('click', () => {
          const all = store.get('projects', []);
          store.set('projects', all.filter(x => x.id !== p.id));
          renderProjects();
        });
        projectsList.appendChild(el);
      });
    }

    function renderCustomers() {
      const items = store.get('customers', []);
      customersList.innerHTML = '';
      if (!items.length) { customersList.innerHTML = `<div class="empty">No messages yet</div>`; return; }
      items.forEach(c => {
        const el = document.createElement('div');
        el.className = 'item';
        el.innerHTML = `
          <div style="width:64px; height:64px; display:flex; align-items:center; justify-content:center; background:#111827; border-radius:10px; border:1px solid rgba(255,255,255,.08)">
            <span class="kbd">${(c.name || '?').slice(0,1).toUpperCase()}</span>
          </div>
          <div class="meta">
            <div class="name">${c.name || ''} <span class="sub">${c.email || ''}</span></div>
            <div class="sub">${c.message || ''}</div>
          </div>
          <div class="actions">
            <button class="btn danger" data-id="${c.id}">Delete</button>
          </div>
        `;
        el.querySelector('button').addEventListener('click', () => {
          const all = store.get('customers', []);
          store.set('customers', all.filter(x => x.id !== c.id));
          renderCustomers();
        });
        customersList.appendChild(el);
      });
    }

    function validateEmail(v){ return /[^\s@]+@[^\s@]+\.[^\s@]+/.test(v); }

    $('#saveProject').addEventListener('click', () => {
      const heading = projHeading.value.trim();
      const name = projName.value.trim();
      const description = projDesc.value.trim();
      if (!heading || !name || !description) { alert('Please fill heading, name, and description'); return; }
      const all = store.get('projects', []);
      const item = { id: crypto.randomUUID(), heading, name, description, image: imageData, createdAt: Date.now() };
      all.unshift(item);
      store.set('projects', all);
      renderProjects();
      projHeading.value = '';
      projName.value = '';
      projDesc.value = '';
      projImage.value = '';
      projPreview.src = '';
      imageData = '';
    });

    $('#resetProject').addEventListener('click', () => {
      projHeading.value = '';
      projName.value = '';
      projDesc.value = '';
      projImage.value = '';
      projPreview.src = '';
      imageData = '';
    });

    document.addEventListener('keydown', (e) => {
      if ((e.metaKey || e.ctrlKey) && e.key === 'Enter') {
        if ($('.tab.active')?.getAttribute('data-tab') === 'projects') $('#saveProject').click();
      }
    });

    $('#exportProjects').addEventListener('click', () => {
      const data = store.get('projects', []);
      const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url; a.download = 'projects.json'; a.click();
      URL.revokeObjectURL(url);
    });

    $('#importProjects').addEventListener('click', () => $('#importProjectsFile').click());
    $('#importProjectsFile').addEventListener('change', async (e) => {
      const f = e.target.files && e.target.files[0];
      if (!f) return;
      const text = await f.text();
      try {
        const json = JSON.parse(text);
        if (!Array.isArray(json)) throw new Error('Invalid JSON');
        store.set('projects', json);
        renderProjects();
      } catch { alert('Invalid projects JSON'); }
      e.target.value = '';
    });

    $('#clearProjects').addEventListener('click', () => {
      if (confirm('Clear all projects?')) { store.set('projects', []); renderProjects(); }
    });



    $('#exportCustomers').addEventListener('click', () => {
      const rows = store.get('customers', []);
      const header = ['name','email','message'];
      const csv = [header.join(',')].concat(rows.map(r => [r.name, r.email, r.message].map(v => '"' + String(v).replaceAll('"','""') + '"').join(','))).join('\n');
      const blob = new Blob([csv], { type: 'text/csv' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url; a.download = 'customers.csv'; a.click();
      URL.revokeObjectURL(url);
    });

    $('#clearCustomers').addEventListener('click', () => {
      if (confirm('Clear all customers?')) { store.set('customers', []); renderCustomers(); }
    });

    renderProjects();
    renderCustomers();
  </script>
</body>
</html>

