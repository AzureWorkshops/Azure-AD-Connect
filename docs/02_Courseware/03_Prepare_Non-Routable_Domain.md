## Objective
In typical on-premises installations of Active Directory, utilized domain name extensions, such as ".local", create what are known as _non-routable domains_.  In other words, there's no such top-level domain (TLD) extension.  In the words of Microsoft's support:
!!<h4>Synchronization</h4>Azure AD Connect only synchronizes users to domains that are verified by Office 365. This means that the domain also is verified by Azure Active Directory because Office 365 identities are managed by Azure Active Directory. In other words, the domain has to be a valid Internet domain (for example, .com, .org, .net, .us, etc.). If your internal Active Directory only uses a non-routable domain (for example, .local), this can't possibly match the verified domain you have on Office 365.

The objective for this step is to modify our local domain to create a routable domain.  We will then update the UPN of our users to take advantage of this new domain.

## Add UPN Suffixes
We will need to remotely connect to **dc1** in order to update Active Directory. Because **dc1** is not accessible from outside of the network, we'll need to connect to it through the **utility** virtual machine.

#### Enable the AD DS Snap-In
By default, the machines do not include the Active Directory management snap-in.  For easier management, let's go ahead and enable it.

  1. Go ahead and RDP into the **utility** virtual machine.  Once connected to the **utility** VM, RDP into **dc1**.  You can connect to **dc1** by using it's DNS hostname (e.g. "dc1") or it's IP address, 10.3.1.4.

  2. Once connected to **dc1**, _Server Manager_ should automatically open. If it doesn't, go ahead and open it now.

  3. In the top-right of _Server Manager_, click on **Manage**.  Then, click on **Add Roles and Features**.

  4. In the "Before you begin" screen, click "Next."

  5. Make sure "Role-based or feature-based installation" is selected, then click "Next."

  6. For the destination server, your local domain controller should be highlighted.  Click "Next."

  7. We don't need to add any additional roles at this point, so just click "Next."

  8. For features, we need to add two features. You can install both by selecting:  **Remote Server Administration Tools &gt; Role Administration Tools &gt; AD DS and AD LDS Tools &gt; AD DS Tools**. This will add the AD Domain Services snap-in and command-line tools.

  9. Click "Next."

  10. Finally, click "Install."

This should only take a minute or two to complete.  You can click "Close" when the process has completed.

#### Add Suffix to AD Domains and Trusts
With the snap-in installed, we can easily add the UPN suffix to our Active Directory.

  1. If it's not still open, launch _Server Manager_.

  2. In the top-right of _Server Manager_, click on **Tools**.  Then, click on **Active Directory Domains and Trusts**.

  3. In the _Active Directory Domains and Trusts_ window, right-click **Active Directory Domains and Trusts** in the left pane, and then choose "Properties."

  4. In the _Alternative UPN suffixes_ box, enter your full domain of your Office 365 tenant (e.g. _&lt;yourcompany&gt;_.onmicrosoft.com). Click "Add."

  5. Click "OK."

#### Change the UPN suffix for existing users
Now that we've added an alternative UPN to our domain, we need to update each of our users to use this domain as the _primary_ UPN as that is what Azure AD Connect uses to match identities.

  1. Again, if it's not still open, launch _Server Manager_.

  2. In the top-right of _Server Manager_, click on **Tools**.  Then, click on **Active Directory Users and Computers**.

  3. In the _Active Directory Users and Computers_ window, expand your ".local" domain and click on **Users**.

  4. There are 3 user accounts for which we need to update the UPN (NOTE: We do not want to sync the local _cloudadmin_ enterprise administrator account to the cloud in order to preserve boundaries.  You should utilize a separate account in Azure for administering Azure AD.)

        * Jim Smith
        * Richard Jackson
        * Sally Holly

  5. For each of these accounts, righ-click on the account and choose **Properties**.

  6. Click on the **Account** tab.

  7. In the dropdown list next to the username, change the selection from your local domain to the "onmicrosoft.com" domain.  Click "OK."

Congratulations! Your local Active Directory is now ready to begin basic synchronization with Azure AD.  

One thing to keep in mind is that updating the UPN in the last step now requires these three users to use the FQDN of the _onmicrosoft.com_ account rather than the _.local_ domain if they use the _first.last@domain.local_ format for the username.  However, most users don't login using a FQDN.  Instead they, like what we've done in this workshop, use the pre-Windows 2000 method of specifying the username (e.g. MYCOMPANY\first.last).  Not too big of a deal, but, again, just something to make note of.

Finally, if you have a lot of users in your domain, manually updating the UPN domain for each user can be a tedious task. Luckily for us, here's a PowerShell script for that:

```PS
$LocalUsers = Get-ADUser -Filter {UserPrincipalName -like '*mycompany.local'} -Properties userPrincipalName -ResultSetSize $null

$LocalUsers | foreach {$newUpn = $_.UserPrincipalName.Replace("mycompany.local","mycompany.onmicrosoft.com"); $_ | Set-ADUser -UserPrincipalName $newUpn}
```