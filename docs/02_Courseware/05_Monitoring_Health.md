## Objective
We are going to conclude this workshop with enabling monitoring on our Active Directory Domain Services.

## Install the Agent
In order to see reports for our domain services, we need to install the Azure AD Connect Health Agent for AD DS onto our domain controller.

#### Disable IE ESC
By default, Internet Explorer Enhanced Security Configuration is enabled which will prevent us from downloading anything.  We need to disable this. (**NOTE:** In production, you would typically not do this.  In production, you would leave IE ESC enabled and copy the downloaded agent via RDP onto the machine.  However, since this is a workshop, we'll make some concessions.)

  1. If you're not still connected to the **dc1** VM, go ahead and do that now. As a reminder, you will need to do so _through_ the **utility** machine.

  2. Once you've connected **dc1**, open _Service Manager_ if it's not already open.

  3.  In the left menu of _Server Manager_, click on **Local Server**.

  4. In the resulting page, you'll see a couple of sections. The first section is labeled _Properties_.  _Properties_ has two columns.  Half-way down the right column, you will see _IE Enhanced Security Configuration_. To the right of that in blue, you probably see **On**. Click on it.

  5. In the _Internet Explorer Enhanced Security Configuration_ dialog, choose **Off** for both, Administrators and Users. Then, click _OK_.

#### Download and Install the Agent
Now we're ready to download and install the agent.

  1. On **dc1**, open a web browser and go to [http://go.microsoft.com/fwlink/?LinkID=820540](http://go.microsoft.com/fwlink/?LinkID=820540). This will automatically download the agent.

  2. Once the download is complete, run it.

  3. In the **Microsoft Azure AD Connect Health agent for AD DS Setup** window, click **Install**.

  4. Once it has completed installation and has informed you that the setup was successful, click **Configure Now**.

  5. This will run a PowerShell script and require that you authenticate with Azure. Enter your credentials for your _&lt;yourcompany&gt;.onmicrosoft.com_ account.

  6. After a few seconds of watching the script continue to run, you should see that the **Agent registration completed successfully.**  Go ahead and close the PowerShell window.

## View Agent Metrics
We're now ready to see how our domain controller is functioning. Let's return to Azure to view the reports.

  1. In Azure's left menu, click on **Azure Active Directory** <img src="../images/azure_ad_icon.jpg" class="inline"/>.

  2. In the _Azure Active Directory_ blade, click on **Azure AD Connect** <img src="../images/azure_ad_connect_icon.jpg" class="inline"/>.

  3. Under **HEALTH AND ANALYTICS**, click on **Azure AD Connect Health** (I know, it's a little obscure).

  4. There are three sections to the health dashboard - AD FS, AD Connect (Sync), and AD DS. Since we don't have Federated Services configured, this tile should be empty.  However, you should see both, respective, domains under AD Connect and AD DS.  Clicking on these domains will give us details of how they are functioning.

Azure AD Conenct Health is still very young in development.  As you click around, you may find some features disabled.  Keep monitoring this to see how it expands to give you greater visability into your AD infrastructure.