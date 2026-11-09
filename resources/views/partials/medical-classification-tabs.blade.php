<style>
.medical-modal-dialog {
    width: 95vw;
    max-width: 1000px !important;
}
.medical-modal-dialog .modal-content {
    max-height: 88vh;
    border: 0;
    border-radius: 10px;
    overflow: hidden;
}
.medical-modal-tabs {
    flex: 0 0 auto;
    flex-wrap: nowrap;
    gap: 2px;
    padding: 8px 16px 0;
    overflow-x: auto;
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}
.medical-modal-tabs .nav-link {
    padding: 8px 14px;
    border: 1px solid transparent;
    border-bottom: 0;
    border-radius: 6px 6px 0 0;
    color: #55606e;
    font-size: 13px;
    font-weight: 600;
    white-space: nowrap;
}
.medical-modal-tabs .nav-link:hover {
    background: #eef2f7;
    color: #395272;
}
.medical-modal-tabs .nav-link.active {
    border-color: #dee2e6 #dee2e6 #fff;
    background: #fff;
    color: #395272;
}
.medical-modal-body {
    min-height: 0;
    padding: 0;
    overflow: hidden;
}
.medical-modal-content {
    max-height: calc(88vh - 125px);
    min-height: 260px;
    padding: 18px 24px 24px;
    overflow-y: auto;
}
.medical-modal-content ul {
    padding-left: 20px;
}
.medical-modal-content li {
    margin-bottom: 6px;
}
</style>

<template id="medical-government-health-insurance">
<p class="text-justify">
                Tonga does not maintain a comprehensive national health insurance system administered by the government. Healthcare coverage remains limited in scope and is not universally accessible. The closest equivalent is the Social Security Scheme (SSS) of Tonga, which provides the following cover:
            </p>
            <ul>
                    <li>Restricted primarily to formal sector workers</li>
                    <li>Covers only a limited proportion of the population</li>
                    <li>Provides a constrained range of benefits and healthcare services</li>
                </ul>
            <h6 class="fw-bold">
                <b>Social Security Scheme (SSS) Tonga</b>
            </h6>
            <p class="text-justify">
                SSS is a government-administered insurance program that provides health, social, and financial protection to formal-sector employees. It is managed by the Social Security Board (SSB) under the Ministry of Labour, Immigration and Population and constitutes the country’s principal contributory social protection mechanism for workers.
            </p>
            <h6 class="fw-bold">
                <b>Key facts:</b>
            </h6>

            <ul>
                    <li><b>Established:</b> 1954 (restructured under the 2012 Social Security Law)</li>
                    <li><b>Administering authority:</b> Social Security Board (SSB)</li>
                    <li><b>Coverage:</b> Employees in public and private sector establishments registered under the scheme</li>
                    <li><b>Financing:</b> Payroll-based contributions from employers and employees</li>
                    <li><b>Core benefits: </b> Healthcare services, maternity benefits, sickness allowances, disability benefits, and survivors’ benefits</li>
                </ul>
            <h6 class="fw-bold">
                <b>Legal and institutional background</b>
            </h6>
            <p class="text-justify">
                The scheme was originally established under the Social Security Act of 1954 and subsequently reformed through the 2012 Social Security Law, which aimed to broaden coverage and enhance benefit provisions. The Social Security Board, operating under the Ministry of Labor, Immigration and Population, is responsible for member registration, contribution collection, and benefit administration. It also oversees a network of regional offices and dedicated healthcare facilities serving insured members.
            </p>
            <h6 class="fw-bold">
                <b>Coverage and benefits</b>
            </h6>
            <p class="text-justify">
                SSS applies to employees of registered enterprises employing five or more workers. Contribution rates are generally set at 5% of wages, with 3% contributed by employers and 2% by employees. Covered individuals are entitled to a range of benefits, including medical care, maternity allowances, cash sickness benefits, disability pensions, and funeral grants. Healthcare services are delivered through designated SSB hospitals and clinics, particularly in major urban centers including Yangon and Mandalay.
            </p>
            <h6 class="fw-bold">
                <b>Implementation and challenges</b>
            </h6>
            <p class="text-justify">
                Coverage remains limited to the formal sector, leaving most informal workers outside the scheme. Administrative capacity, awareness, and compliance enforcement have been ongoing challenges. Expansion efforts, including digital registration and pilot programs for informal workers, are gradually extend the protection to a broader labor force.
            </p>
            <h6 class="fw-bold">
                <b>Current role</b>
            </h6>
            <p class="text-justify">
                The Social Security Scheme is Tonga’s primary state-backed mechanism for worker welfare and risk protection, aligning with national objectives for inclusive social protection and labor rights compliance within the country’s evolving economic framework.
            </p>
</template>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const medicalModalIds = [
        'level11Modal',
        'level22Modal',
        'level33Modal',
        'level44Modal',
        'level55Modal',
        'level66Modal'
    ];

    const tabs = [
        { key: 'overview', label: 'Overview' },
        { key: 'role', label: 'Role' },
        { key: 'clinical-services', label: 'Clinical Services' },
        { key: 'government-health-insurance', label: 'Goverment Health Insurance' }
    ];

    medicalModalIds.forEach(function (modalId) {
        const modal = document.getElementById(modalId);
        const body = modal?.querySelector('.modal-body');

        if (!body || body.dataset.medicalTabsInitialized === 'true') return;

        const isPrivateHospital = ['level11Modal', 'level33Modal', 'level55Modal'].includes(modalId);
        const modalTabs = tabs.filter(tab => !isPrivateHospital || tab.key !== 'government-health-insurance');

        modal.querySelector('.modal-dialog')?.classList.add('medical-modal-dialog');

        const sections = {
            overview: document.createDocumentFragment(),
            role: document.createDocumentFragment(),
            'clinical-services': document.createDocumentFragment(),
            'government-health-insurance': document.getElementById('medical-government-health-insurance').content.cloneNode(true)
        };
        let activeSection = 'overview';

        Array.from(body.children).forEach(function (element) {
            const heading = element.textContent.trim().replace(/\s+/g, ' ').toLowerCase();

            if (element.tagName === 'H5') {
                activeSection = 'overview';
                tabs.filter(tab => tab.key !== 'government-health-insurance').forEach(function (tab) {
                    sections[tab.key].appendChild(element.cloneNode(true));
                });
                element.remove();
                return;
            }

            if (element.tagName === 'H6' && heading === 'overview') {
                activeSection = 'overview';
                element.remove();
                return;
            }
            if (element.tagName === 'H6' && heading === 'role') {
                activeSection = 'role';
                element.remove();
                return;
            }
            if (element.tagName === 'H6' && heading === 'clinical services') {
                activeSection = 'clinical-services';
                element.remove();
                return;
            }

            sections[activeSection].appendChild(element);
        });

        const tabNav = document.createElement('ul');
        tabNav.className = 'nav nav-tabs medical-modal-tabs';
        tabNav.setAttribute('role', 'tablist');

        const tabContent = document.createElement('div');
        tabContent.className = 'tab-content medical-modal-content';

        modalTabs.forEach(function (tab, index) {
            const paneId = `${modalId}-${tab.key}`;
            const buttonId = `${paneId}-tab`;
            const navItem = document.createElement('li');
            navItem.className = 'nav-item';
            navItem.setAttribute('role', 'presentation');
            navItem.innerHTML = `
                <button class="nav-link${index === 0 ? ' active' : ''}"
                        id="${buttonId}"
                        data-bs-toggle="tab"
                        data-bs-target="#${paneId}"
                        type="button"
                        role="tab"
                        aria-controls="${paneId}"
                        aria-selected="${index === 0 ? 'true' : 'false'}">
                    ${tab.label}
                </button>`;
            tabNav.appendChild(navItem);

            const pane = document.createElement('div');
            pane.className = `tab-pane fade${index === 0 ? ' show active' : ''}`;
            pane.id = paneId;
            pane.setAttribute('role', 'tabpanel');
            pane.setAttribute('aria-labelledby', buttonId);
            pane.appendChild(sections[tab.key]);
            tabContent.appendChild(pane);
        });

        body.before(tabNav);
        body.appendChild(tabContent);
        body.classList.add('medical-modal-body');
        body.dataset.medicalTabsInitialized = 'true';
    });
});
</script>
