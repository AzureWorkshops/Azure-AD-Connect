## Demo Domain
For the purposes of this workshop, you will need a demo domain name - a domain name that you will _not_ be required to register with a domain name registrar (DNR), but will be used as your fictitious company.  We, of course, do not want to use any domain names associated with production accounts.

The simple way to do this is allow a service to create one for us.  So, to create a random domain name, we'll actually use a random username generator.

Open a browser to [http://jimpix.co.uk/words/random-username-generator.asp](http://jimpix.co.uk/words/random-username-generator.asp) and click the green "Go!" button close to the top of the page.  Upon doing this, you will be presented with 25 different two-word combinations.  Pick one that you like or click the green "Refresh" button until you do.

Once you find a domain name, write it down; you will use it for the remainder of the workshop.

## Office 365
Now that we have a domain name, let's create a 1-month trial Office 365 account. This will automatically create a domain in Azure AD which we'll connect to virtual datacenter later in the workshop.

Direct your browswer to [https://products.office.com/en-us/business/office-365-affiliate-program-try-business-premium](https://products.office.com/en-us/business/office-365-affiliate-program-try-business-premium).  In order to take advantage of some of the Azure Active Directory premium features, we will need the Business Premium edition of Office 365.

  1. Begin by clicking on the green button "Start your free business trial".

  2. Complete the form on the first page:

     * Choose your country (this cannot be changed later due to data sovereignty and other factors)
     * Enter your name
     * Enter an email address (this should be a _legitimate email address_ as this will be the administrator's security/reset email) 
     * Enter a phone number (enter a _legitimate cell phone number_ in order to test multi-factor authentication)
     * Enter your company name from above
     * Choose a company size  

  3. For the form on the second page:

     * Enter a username for yourself in a format you prefer (e.g. if your name was John Doe, you could enter: john.doe, jdoe, john_doe, etc.)
     * For your company, enter the company name from above (NOTE: you will see here that the initial domain name will be _yourcompany_.onmicrosoft.com.  This is the Azure Active Directory domain to which we will connect later in the workshop.) If your domain name has already been used, try another one from the previous list.
     * Enter and confirm your password

  4. Prove you are not a robot by entering a telephone number at which you can receive a text or phone call. 

  5. Enter the code that was text'ed to you or that you received from the auto-attendant.

It should take less than a minute to create your account.  After the process is complete, you should see a message stating that you are ready to go.  While you account was _created_ in less than a minute, it may take up to another 15 minutes or so to finish creating all of the additional services in Office 365.  That's fine, as it will be a while before we actually need them.

Finally, remember this trial account is only good for 30 days.  While Microsoft will not initially _delete_ your account, they will disable functionality.

## Azure
Finally, we need to create a trial Azure subscription.  Believe it or not, we are already using Azure Active Directory because we just set up Office 365.  Office 365 uses Azure AD underneath to manage all of our exchange users.  We simply need to create a subscription so that we can leverage Azure's other offerings.

Direct your browser to [https://azure.microsoft.com/en-us/free/](https://azure.microsoft.com/en-us/free/) and begin by clicking on the green button that reads **Start free**.

**IMPORTANT:** On the sign-up form page, you should see your new email address that associated with your new Office 365 account.  If not, click on **Sign Out** and re-authenticate using your newly formed credentials (e.g. username@_yourcompany_.onmicrosoft.com).

  1. In the first section, complete the form in its entirety. Make sure you use your _real_ email address for the important notifications.

  2. In the second section, enter a _real_ mobile phone number to receive a text verification number.  Click send message and re-type the received code.

  3. Enter a valid credit card number. **NOTE:** You will _not_ be charged.  This is for verification of identity only in order to comply with federal regulations.  Your account statement may see a temporary hold of $1.00 from Microsoft, but, again, this is for verification only and will "fall off" your account within 2-3 banking days.

  4. Agree to Microsoft's Terms and Conditions and click **Sign Up**.

This may take a minute or two, but you should see a welcome screen informing you that your subscription is ready.  Like the Office 365 trial above, the Azure subscription is good for up to $200 of resources for 30 days.  After 30 days, your subscription (and resources) will be suspended unless you convert your trial subscription to a paid one.  And, should you choose to do so, you can elect to use a different credit card than the one you just entered.

Congratulations!  You've now created an Office 365 tenant; an Azure tenant and subscription; and, have linked the two together.