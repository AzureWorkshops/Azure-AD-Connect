## Installing the CLI
Once you have the requisites installed, you will then need to install the CLI.  The CLI can be installed from the command-line or terminal prompt using Node.js.

First, open a command-line window or terminal prompt. Then, type the following command:

```bash
npm install azworkshops-cli -g
```
Running this command will take a few seconds to complete.  But, by doing so will download the Azure Workshops CLI, along with its dependencies, into a directory that is located in a globally accessible path.

## Azure Subscription
As stated in the requirements section, the workshop requires an active Azure subscription.
> It is recommended that you do not use an Azure subscription that is currently being used for production.  The CLI will create it's own resource groups, but it is not the best practice to utilize production environments for testing and workshops, such as this.

## Creating the Lab Environment