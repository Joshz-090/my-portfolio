document.addEventListener('DOMContentLoaded', () => {
    const terminalOverlay = document.getElementById('terminal-overlay');
    const terminalInput = document.getElementById('terminal-input');
    const terminalOutput = document.getElementById('terminal-output');
    const terminalBody = document.querySelector('.terminal-body');
    const openTerminalBtn = document.getElementById('open-terminal-btn');
    const closeTerminalBtn = document.getElementById('close-terminal-btn');

    const welcomeMessage = `
Welcome to JY-OS [Version 3.0.0]
(c) 2025 Eyasu Zerihun. All rights reserved.

System stabilizing... Done.
Type 'help' to see available commands.
`;

    let welcomeShown = false;

    function openTerminal() {
        terminalOverlay.classList.add('open');
        setTimeout(() => terminalInput.focus(), 100);
        if (!welcomeShown) {
            printToTerminal(welcomeMessage, 'info');
            welcomeShown = true;
        }
    }

    function closeTerminal() {
        terminalOverlay.classList.remove('open');
    }

    if (openTerminalBtn) openTerminalBtn.addEventListener('click', openTerminal);
    if (closeTerminalBtn) closeTerminalBtn.addEventListener('click', closeTerminal);
    
    terminalOverlay.addEventListener('click', (e) => {
        if (e.target === terminalOverlay) {
            closeTerminal();
        }
    });

    terminalInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            const command = this.value.trim();
            if (command) {
                processCommand(command);
            } else {
                 printToTerminal('', 'normal', true);
            }
            this.value = '';
            setTimeout(() => {
                terminalBody.scrollTop = terminalBody.scrollHeight;
            }, 10);
        }
    });

    function printToTerminal(text, type = 'normal', isCommand = false) {
        const div = document.createElement('div');
        if (isCommand) {
            div.className = 'command-echo';
            div.innerHTML = `<span class="prompt">guest@eyasu:~$</span> <span class="command-line">${text}</span>`;
        } else {
            div.className = `response ${type}`;
            div.innerHTML = text.trim().replace(/\n/g, '<br>');
        }
        terminalOutput.appendChild(div);
    }

    function processCommand(cmd) {
        const lowerCmd = cmd.toLowerCase().trim();
        console.log('Processing command:', lowerCmd); // Debugging
        printToTerminal(cmd, 'normal', true);

        if (!lowerCmd) return;

        switch (lowerCmd) {
            case 'help':
                printToTerminal(`
Available Commands:
  ls        - List directory contents
  cd [dir]  - Change directory (navigates site)
  cat [file]- Read file content
  whoami    - System identity check
  status    - Current activity and focus
  skills    - Technical stack summary
  theme     - Toggle light/dark mode
  clear     - Reset terminal view
  exit      - Terminate session
                `, 'info');
                break;

            case 'ls':
                printToTerminal(`
index.php      about.php      projects.php
blog.php       contact.php    resume.pdf
                `, 'success');
                break;

            case 'cd index.php':
            case 'cd /':
            case 'cd home':
                printToTerminal('Navigating to Home...', 'info');
                setTimeout(() => window.location.href = 'index.php', 500);
                break;

            case 'cd about.php':
            case 'cd about':
                printToTerminal('Navigating to About...', 'info');
                setTimeout(() => window.location.href = 'about.php', 500);
                break;

            case 'cd projects.php':
            case 'cd projects':
                printToTerminal('Navigating to Projects...', 'info');
                setTimeout(() => window.location.href = 'projects.php', 500);
                break;

            case 'cd blog.php':
            case 'cd blog':
                printToTerminal('Navigating to Blog...', 'info');
                setTimeout(() => window.location.href = 'blog.php', 500);
                break;

            case 'cd contact.php':
            case 'cd contact':
                printToTerminal('Navigating to Contact...', 'info');
                setTimeout(() => window.location.href = 'contact.php', 500);
                break;

            case 'whoami':
                printToTerminal(`
Name:       Eyasu Zerihun
Role:       Full-Stack Developer & SE Student
Focus:      Backend Systems & AI
Identity:   A problem solver who speaks logic.
                `);
                break;

            case 'status':
                printToTerminal(`
System:     Online
Focus:      Optimization, Scalability, and Clean Code.
Current:    Building a feature-rich portfolio.
                `);
                break;

            case 'skills':
                printToTerminal(`
Backend:    Python (Django/Flask), PHP, Java
Frontend:   React, JS, Tailwind
Tools:      Git, Docker, PostgreSQL
                `, 'success');
                break;

            case 'theme':
                printToTerminal('Switching themes...', 'info');
                const themeToggle = document.getElementById('theme-toggle');
                if (themeToggle) {
                    themeToggle.click();
                } else {
                    document.documentElement.classList.toggle('dark');
                }
                break;

            case 'clear':
                terminalOutput.innerHTML = '';
                break;

            case 'exit':
                printToTerminal('Closing connection...', 'error');
                setTimeout(closeTerminal, 800);
                break;
            
            case 'sudo':
                printToTerminal('Error: This incident will be reported.', 'error');
                break;

            default:
                if (lowerCmd.startsWith('cd ')) {
                    printToTerminal(`Directory not found: ${cmd.split(' ')[1] || ''}`, 'error');
                } else if (lowerCmd.startsWith('cat ')) {
                    printToTerminal(`Permission denied: Cannot read ${cmd.split(' ')[1] || ''}`, 'error');
                } else {
                    printToTerminal(`Command not found: ${cmd}. Type 'help' for available commands.`, 'error');
                }
                break;
        }
        
        // Ensure scroll to bottom after command processing
        setTimeout(() => {
            terminalBody.scrollTop = terminalBody.scrollHeight;
        }, 50);
    }
});

