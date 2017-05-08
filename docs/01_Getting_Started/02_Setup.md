## Installing the CLI
Once you have the requisites installed, you will then need to install the CLI.  The CLI can be installed from the command-line or terminal prompt using Node.js.

First, open a command-line window or terminal prompt. Then, type the following command:

```bash
npm install azworkshops-cli -g
```
Running this command will take a few seconds to complete.  But, doing so will download the Azure Workshops CLI, along with its dependencies, into a directory that is located in a globally accessible path.

## Azure Subscription
As stated in the requirements section, the workshop requires an active Azure subscription.
> It is recommended that you do not use an Azure subscription that is currently being used for production.  The CLI will create it's own resource groups, but it is not the best practice to utilize production environments for testing and workshops, such as this.

For best results, it is recommended that you setup register for the trial subscription as outlined on the [previous](./01_Office_365_and_Azure_Registration.md) page.

## Creating the Lab Environment
>The automated building of the lab environment can take approximately 30 minutes to complete.  It is best to begin this process while you are reviewing the workshop material.

#### Verify Installation of the CLI
From a prompt, enter the following command:
```bash
azworkshops --version
```

A successful execution of the command should print the current version of the Azure Workshops CLI which can be found in the right column, slightly down the page, of the Node Package Manager [website](https://www.npmjs.com/package/azworkshops-cli). If you do not see a version number, return to the requirements [setup](./00_Requirements.md) and try reinstalling them.

If you successfully see the correct version number, you are ready to begin the lab setup.

#### Build the Environment
From a prompt, enter the following:
```bash
azworkshops
```

  1. You will be presented with a menu from which to choose a base configuration.  Choose the base configuration for **Basic Active Directory**.
  2. You will then need to authenticate with Azure.  Visit [http://aka.ms/devicelogin](http://aka.ms/devicelogin) and enter the code provided to you.
  3. Choose the subscription that you would like to use for this workshop.
  4. Select the location for the created resources.  It is best to choose a location that is closest to you in order to reduce latency.
  5. You will then be prompted with additional configuration questions.  
  
     1. For the AD domain name, enter your company name from the previous page with '.local' as the TLD (e.g. mycompany.local).

     2. For the NETBIOS name, it should automatically be an ALLCAPS version of the company name that you just entered (without the '.local' TLD extension). If so, just press Enter to accept the default. If not, enter a valid NETBIOS name.

  6. After completing the configuration questions, the building of the lab environment will begin. Once completed, you will be presented with all of the lab's configured settings (e.g. resource group, domain, domain admin, password, etc.) It is best to copy this down for future use.