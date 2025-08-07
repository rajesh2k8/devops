pipeline {
  agent any
  triggers {
    pollSCM('* * * * *')  // Or rely on webhook (preferred)
  }
  stages {
    stage('Show Tool Versions') {
      steps {
        sh '''
          echo "=== Tool Versions ==="
          php -v
          composer --version
          node -v
          npm -v
        '''
      }
    }
    stage('Build') {
      steps {
        echo "Building branch ${env.BRANCH_NAME}"
        // Add your build commands
      }
    }
  }
}
