#!/bin/bash

echo "=== DohaQuest WordPress Starting ==="

# Run setup in background
/usr/local/bin/setup.sh &

# Start Apache in foreground (keeps container running)
exec apache2-foreground
