<template>
  <div class="loaderWrapper">
    <div class="loader loader4">
      <div>
        <div>
          <div>
            <div>
              <div>
                <div>
                  <div>
                    <div>
                      <div>
                        <div/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
$white: #ffffff;
$pink: #e91e63;

.loaderWrapper {
  backdrop-filter: blur(2.5px);
  height: 100vh;
  position: fixed;
  width: 100vw;
  display: flex;
  align-items: center;
  justify-content: center;
  top: 0;
  left: 0;
  z-index: 1000;
}

@keyframes rotate {
  0% {
    transform: rotate(0deg);
  }
  50% {
    transform: rotate(180deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes rotate2 {
  0% {
    transform: rotate(0deg);
    border-top-color: $white;
  }
  50% {
    transform: rotate(180deg);
    border-top-color: $pink;
  }
  100% {
    transform: rotate(360deg);
    border-top-color: $white;
  }
}

@mixin loaderDivMixin {
  border-radius: 50%;
  padding: 8px;
  border: 3px solid transparent;
  animation: rotate linear 3.5s infinite;
}

.loader {
  position: relative;
  width: 150px;
  height: 150px;
  display: block;
  overflow: hidden;

  div {
    height: 100%;
  }
}

.loader4, .loader4 div {
  @include loaderDivMixin;
  border-radius: 50%;
  padding: 4px;
  animation: rotate2 4s infinite linear;
}

.loader, .loader * {
  will-change: transform;
}
</style>
