<div class="sidebar">
    <h1>CML Backend</h1>
    <ul>
        <li><a href="#dashboard"><img src='<?php echo $this->url($src . 'assets/svg/home.svg'); ?>'> Dashboard</a></li>
        <li><a href="#pages"><img src='<?php echo $this->url($src . 'assets/svg/site.svg'); ?>'> Seiten</a></li>
        <li><a href="#settings"><img src='<?php echo $this->url($src . 'assets/svg/settings.svg'); ?>'> Einstellungen</a></li>
    </ul>
</div>
<header>
    <h2>Willkommen im CML Backend</h2>
</header>
<div class="main-content">
    <div class="content">
        <div id="dashboard">
            <div class="card">
                <div class="card-title">Seitenaufrufe</div>
                <div class="card-content">
                    <canvas id="visitsChart"></canvas>
                </div>
            </div>
        </div>
        <div id="pages" style="display: none;">
            <div class="card">
                <div class="card-title">Seiten verwalten</div>
                <div class="card-content">
                    <button id="addPage" class="btn"><i class="fas fa-plus"></i> Neue Seite</button>
                    <div id="pageList"></div>
                </div>
            </div>
        </div>
        <div id="settings" style="display: none;">
            <div class="card">
                <div class="card-title">Einstellungen</div>
                <div class="card-content">
                    <form id="settingsForm">
                        <label for="siteName">Website Name:</label>
                        <input type="text" id="siteName" name="siteName" value="Meine Website">

                        <label for="primaryColor">Primärfarbe:</label>
                        <input type="color" id="primaryColor" name="primaryColor" value="#4a90e2">

                        <button type="submit" class="btn">Speichern</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>